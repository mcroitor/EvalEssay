<?php

include_once __DIR__ . "/../lib/autoload.php";

use mc\alpaca\OllamaClient;

$ollamaUrl = "http://127.0.0.1:11434";

$client = new OllamaClient($ollamaUrl);
$client->setOption('stream', true);

$availableModels = $client->getModelsList();

echo json_encode(['available_models' => $availableModels]);
