<?php

include_once __DIR__ . "/../lib/autoload.php";

use mc\alpaca\OllamaClient;
use \mc\essay\Task;
use \mc\essay\Assessor;
use \mc\Logger;

$logger = Logger::stderr();

$ollamaUrl = "http://127.0.0.1:11434";

$taskData = json_decode(file_get_contents('php://input'), true);

$taskData["prompt_template"] = <<<EOT
# Essay Task: {{task_name}}

You are an expert evaluator for technical assignments.

Assess the Student Response based on the below rubric and provide scores for each criterion in the table format.

## Task Description

{{task_description}}

## Evaluation rubric

{{rubric}}

## Required output format:

{{output_format}}

No other text outside the table format.

Re-check correctness of output format, especially Total Score calculation.

EOT;

$client = new OllamaClient($ollamaUrl);

$client->setModelName($taskData['model'] ?? 'ministral-3:8b');

$task = new Task($taskData);
$essay = $taskData['essay'] ?? '';

$assessor = new Assessor($client);
$assessor->setOption("stream", false);

try {

    $evaluation = $assessor->assessEssay($task, $essay);
    echo json_encode(['evaluation' => htmlspecialchars($evaluation, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8')]);
} catch (Exception $e) {
    http_response_code(500);
    header('Content-Type: application/json');
    $logger->error("Error during essay assessment: " . $e->getMessage());
    echo json_encode(['error' => $e->getMessage()]);
}
