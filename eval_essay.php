<?php

include_once __DIR__ . "/lib/autoload.php";


use mc\alpaca\OllamaClient;
use \mc\essay\Task;
use \mc\essay\Assessor;
use \mc\essay\Report;

/**
 * Prints usage information for the script.
 */
function printUsage(string $scriptName): void
{
    echo "Usage: php {$scriptName} [options]\n";
    echo "Script to evaluate essay responses using language models via Ollama.\n";
    echo "Script options allows to override config settings.\n\n";
    echo "Options:\n";
    echo "  -h, --help           Show this help message\n";
    echo "  -c, --config FILE    Path to config file (default: config.json)\n";
    echo "  -s, --server URL     Ollama server URL\n";
    echo "  -i, --input DIR      Path to input directory\n";
    echo "  -o, --output DIR     Path to output directory\n";
    echo "  -r, --rubric FILE    Path to rubric file\n";
    echo "  -t, --task FILE      Path to task definition file\n";
    echo "  -m, --models LIST    Comma-separated list of models to use\n";
}

/**
 * Checks if a path is absolute.
 * @param string $path Path to check
 * @return bool True if path is absolute, false otherwise
 */
function is_absolute_path(string $path): bool
{
    return (DIRECTORY_SEPARATOR === '\\')
        ? (preg_match('/^[a-zA-Z]:/', $path) || substr($path, 0, 2) === '\\\\')
        : (substr($path, 0, 1) === '/');
}

/**
 * Loads essay responses from .essay files in a folder.
 * @param string $folderPath Path to folder containing .essay files
 * @return array Array of essays keyed by filename
 */
function loadEssayResponses(string $folderPath): array
{
    $responses = [];
    $files = glob("{$folderPath}/*.essay");
    foreach ($files as $file) {
        $key = basename($file, ".essay");
        $responses[$key] = file_get_contents($file);
    }
    return $responses;
}

function loadTask(string $configFile): Task
{
    $basedir = dirname($configFile);
    $data = json_decode(file_get_contents($configFile), true);

    $taskConfig = [
        "task_name" => $data['name'] ?? 'Essay Task',
        "task_description" => file_get_contents($basedir . DIRECTORY_SEPARATOR . $data['task']),
        "rubric" => file_get_contents($basedir . DIRECTORY_SEPARATOR . $data['rubric']),
        "output_format" => file_get_contents($basedir . DIRECTORY_SEPARATOR . $data['output_format'])
    ];
    return new Task($taskConfig);
}

function parseCommandLineArgs(array $options): array
{
    $config = [];
    if (isset($options['c']) || isset($options['config'])) {
        $config['config_file'] = $options['config'] ?? $options['c'];
    }
    if (isset($options['s']) || isset($options['server'])) {
        $config['ollama_server'] = $options['server'] ?? $options['s'];
    }
    if (isset($options['i']) || isset($options['input'])) {
        $config['input_directory'] = $options['input'] ?? $options['i'];
    }
    if (isset($options['o']) || isset($options['output'])) {
        $config['output_directory'] = $options['output'] ?? $options['o'];
    }
    if (isset($options['r']) || isset($options['rubric'])) {
        $config['rubric_file'] = $options['rubric'] ?? $options['r'];
    }
    if (isset($options['t']) || isset($options['task'])) {
        $config['task_config'] = $options['task'] ?? $options['t'];
    }
    if (isset($options['m']) || isset($options['models'])) {
        $modelsString = $options['models'] ?? $options['m'];
        $config['models'] = array_map('trim', explode(',', $modelsString));
    }
    return $config;
}


$logger = \mc\Logger::stdout();

// Parse command line arguments using getopt
$shortopts = "hc:s:i:o:r:t:m:";
$longopts = [
    "help",
    "config:",
    "server:",
    "input:",
    "output:",
    "rubric:",
    "task:",
    "models:"
];

$options = getopt($shortopts, $longopts);

// Handle help option
if (isset($options['h']) || isset($options['help'])) {
    printUsage(basename($argv[0]));
    exit(0);
}

// Parse configuration overrides from command line
$cliConfig = parseCommandLineArgs($options);

// Load configuration file
$configFile = $cliConfig['config_file'] ?? __DIR__ . "/config.json";
$config = [];

if (file_exists($configFile)) {
    $configData = json_decode(file_get_contents($configFile), true);
    if ($configData === null) {
        $logger->error("Invalid JSON in configuration file '{$configFile}'");
        exit(1);
    }
    $config = $configData;
} elseif (isset($cliConfig['config_file'])) {
    // Only show error if user explicitly specified a config file that doesn't exist
    $logger->error("Configuration file '{$configFile}' not found");
    exit(1);
}

// Merge CLI arguments with config file (CLI arguments override config file)
$config = array_merge($config, $cliConfig);

$nrIterations = $config['nr_iterations'] ?? 10;

// ollama server URL
$ollamaUrl = $config['ollama_server'] ?? "http://127.0.0.1:11434";

// set ollama client and model
$client = new OllamaClient($ollamaUrl);
$client->setOption('stream', true);

try {
    $availableModels = $client->getModelsList();
} catch (Exception $e) {
    $logger->error("Cannot connect to Ollama server at '{$ollamaUrl}': " . $e->getMessage());
    exit(1);
}

$models = $config['models'] ?? $availableModels;
$models = array_intersect($models, $availableModels);

if (empty($models)) {
    $logger->error("No valid models available. Available models: " . implode(", ", $availableModels));
    exit(1);
}

$logger->info("Using models: " . implode(", ", $models));

// output folder
$output_folder = isset($config['output_directory']) ?
    (is_absolute_path($config['output_directory']) ? $config['output_directory'] : __DIR__ . "/" . $config['output_directory']) :
    __DIR__ . "/output";
if (!is_dir($output_folder)) {
    mkdir($output_folder, 0777, true);
}
$logger->info("Output directory: {$output_folder}");

// define the essay task
if (!isset($config['task_config'])) {
    $logger->error("Task configuration file not specified. Use -t or --task option, or set 'task_config' in config.json");
    exit(1);
}
$essayTask = loadTask($config['task_config']);
$promptTemplate = file_get_contents(__DIR__ . "/templates/prompt.template");

$logger->info("Essay task prompt:");

echo $essayTask->buildPrompt("", $promptTemplate);

$logger->info("Loading essay responses...");
$input_folder = isset($config['input_directory']) ?
    (is_absolute_path($config['input_directory']) ? $config['input_directory'] : __DIR__ . "/" . $config['input_directory']) :
    __DIR__ . "/data/input";

if (!is_dir($input_folder)) {
    $logger->error("Input directory '{$input_folder}' not found");
    exit(1);
}
$logger->info("Input directory: {$input_folder}");

$responses = loadEssayResponses($input_folder);
$logger->info("Loaded " . count($responses) . " essay responses.");

$logger->info("Starting essay assessments...");
foreach ($models as $model) {
    $logger->info("Assessing with model: {$model}");
    $client->setModelName($model);
    
    // create the essay assessor
    $assessor = new Assessor($client, $promptTemplate);
    $model_name = str_replace([":", ".", "/"], "_", $model);
    
    // prepare for reporting
    $report = new Report($output_folder, $model);

    // register essay
    $report->insertEssay($essayTask->getTaskName(), $essayTask->getOutputFormat(), $essayTask->getRubric(), "N/A");
    // register responses
    foreach ($responses as $key => $response) {
        $report->insertResponse($essayTask->getTaskName(), $key, $response);
    }

    // assess the essay
    $step = 0;
    while ($step < $nrIterations) {
        ++$step;
        foreach ($responses as $key => $response) {
            // count essay assessments in report
            $essayCount = $report->getNumberOfAssessments($key);
            $id = $essayCount + 1;

            $logger->info("----------------------");
            $logger->info("Student {$key}, assessment #{$id}:");
            $logger->info("Assessed with:");

            // assess the essay
            // stream mode outputs directly to stdout
            $score = $assessor->assessEssay($essayTask, $response);

            echo "\n";
            
            $score = "# Assessment No: {$id}\n\n"
                    . "## Date: " . date('Y-m-d H:i:s') . "\n\n" 
                    . $score;
            $report->insertOutput($key, $id, $score);
        }
    }
    $logger->info("======================");
}
$logger->info("Essay assessments completed.");
