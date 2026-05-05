<?php

include_once __DIR__ . "/../lib/autoload.php";

use mc\alpaca\OllamaClient;

header('Content-Type: application/json');

$ollamaUrl = "http://127.0.0.1:11434";

$client = new OllamaClient($ollamaUrl);
$client->setOption('stream', true);

try {
    $availableModels = $client->getModelsList();

    echo json_encode(['available_models' => $availableModels]);
} catch (\Throwable $e) {
    http_response_code(503);
    echo json_encode([
        'error' => 'Unable to retrieve models list',
        'message' => $e->getMessage(),
    ]);
}
