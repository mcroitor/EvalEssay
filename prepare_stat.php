<?php

require_once __DIR__ . "/lib/autoload.php";

use \mc\Sql\Database;
use \mc\essay\Report;

/// <<< FUNCTIONS
function average(array $numbers): float
{
    return count($numbers) === 0 ? 0 : array_sum($numbers) / count($numbers);
}

function deviation(array $numbers): float
{
    if (count($numbers) === 0) {
        return 0;
    }
    $avg = average($numbers);
    $sum = 0.0;
    foreach ($numbers as $num) {
        $sum += pow($num - $avg, 2);
    }
    return sqrt($sum / count($numbers));
}

/**
 * Reads directory and returns lists of sub-folders as models list.
 * @param string $input_dir
 * @return array Array of model names
 */
function getModelsList(string $input_dir): array
{
    $models = [];
    $files = glob("{$input_dir}/*.db");
    foreach ($files as $file) {
        try {
            $db = new Database("sqlite:{$file}");
            $result = $db->query("SELECT name FROM model LIMIT 1");
            if (!empty($result)) {
                $models[] = $result[0]['name'];
            }
        } catch (\Exception $e) {
            // Ignore errors
            echo "[Warning] Could not read model from database file '{$file}': " . $e->getMessage() . PHP_EOL;
        }
    }
    return $models;
}

/**
 * Each model has its own folder, that contains folders named by essays assessed.
 * @param string $input_dir
 * @param string $model
 * @return array Array of assessed essay names
 */
function listAssessedEssays(string $input_dir, string $model): array
{
    $report = new Report($input_dir, $model);
    $essays = $report->getEssays();
    return $essays;
}

/**
 * Lists assessment files for a given essay in a model's directory.
 * @param string $input_dir Base directory containing model folders
 * @param string $model Model name
 * @param string $essay Essay name
 * @return array Array of assessment file paths (markdown files)
 */
function listEssayAssessments(string $input_dir, string $model, string $essay): array
{
    $report = new Report($input_dir, $model);
    $assessments = $report->getAssessments($essay);
    return $assessments;
}

/**
 * Extracts numeric score from an assessment.
 * 
 * Assessment is provided as an array:
 * [
 *      'assignment_id' => <id>,
 *      'output_text' => <text>
 * ]
 * 
 * Line format example:
 * Total Score: 10/100 points
 * 
 * @param array $assessment
 * @return int|null
 */
function extractScoreFromAssessment(array $assessment): ?int
{
    $content = $assessment['output_text'];
    if (preg_match('/Total Score:\s*([0-9]+)/', $content, $matches)) {
        return intval($matches[1]);
    }
    return null;
}

/**
 * Generates markdown report from assessment data.
 * @param array $data Assessment data structured as [essay => [scores]]
 * @param string $model Model name
 * @return string Markdown formatted report
 */
function toMarkdown(array $data, string $model, bool $detailed = false): string
{
    $lines = [];
    $lines[] = "# Assessment Statistics for Model: {$model}";
    if ($detailed) {
        $lines[] = "";
        $lines[] = "## Detailed Scores";
        $lines[] = "";
        $lines[] = "| Essay | Assessment ID | Score |";
        $lines[] = "|-------|---------------|-------|";
        foreach ($data as $essay => $scores) {
            foreach ($scores as $index => $score) {
                $assessmentId = $index + 1;
                $lines[] = "| {$essay} | {$assessmentId} | {$score} |";
            }
        }
    }

    $lines[] = "";

    $lines[] = "## Summary Statistics";
    $lines[] = "";
    $lines[] = "| Essay | Assessments | Average | Min | Max | Deviation |";
    $lines[] = "|-------|-------------|---------|-----|-----|-----------|";
    foreach ($data as $essay => $scores) {
        $numAssessments = count($scores);
        $averageScore = average($scores);
        $minScore = $numAssessments > 0 ? min($scores) : 0;
        $maxScore = $numAssessments > 0 ? max($scores) : 0;

        $deviation = deviation($scores);
        $lines[] = "| {$essay} | {$numAssessments} | "
            . number_format($averageScore, 2)
            . " | {$minScore} | {$maxScore} | "
            . number_format($deviation, 2) . " |";
    }

    return implode(PHP_EOL, $lines);
}
/// >>>

echo "Preparing assessment statistics..." . PHP_EOL;

$input_dir = __DIR__ . "/data/output";

if (!is_dir($input_dir)) {
    echo "Input directory '{$input_dir}' not found." . PHP_EOL;
    exit(1);
}

echo "Input directory: {$input_dir}" . PHP_EOL;
$models = getModelsList($input_dir);
echo "Found " . count($models) . " models." . PHP_EOL;

$result = [];

foreach ($models as $model) {
    $result[$model] = [];
    echo "Model: " . $model . PHP_EOL;
    $essays = listAssessedEssays($input_dir, $model);
    foreach ($essays as $essay) {
        $result[$model][$essay] = [];
        $assessments = listEssayAssessments($input_dir, $model, $essay);
        foreach ($assessments as $assessment) {
            $score = extractScoreFromAssessment($assessment);
            if ($score !== null) {
                $result[$model][$essay][$assessment['assignment_id']] = $score;
            }
        }
        $count = count($assessments);
        echo " - " . $essay . " (" . $count . " assessments)" . PHP_EOL;
    }
}

foreach ($result as $model => $data) {
    $markdown = toMarkdown($data, $model);
    $filename = str_replace([":", ".", "/"], "_", $model);
    $outputFile = $input_dir . DIRECTORY_SEPARATOR . $filename . "_assessment_stats.md";
    file_put_contents($outputFile, $markdown);
    echo "Statistics for model '{$model}' written to '{$outputFile}'" . PHP_EOL;
}

echo "All statistics generated." . PHP_EOL;
