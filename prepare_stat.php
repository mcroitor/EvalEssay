<?php

/// <<< FUNCTIONS
/**
 * Reads directory and returns lists of sub-folders as models list.
 * @param string $input_dir
 * @return array Array of model names
 */
function getModelsList(string $input_dir): array {
    $models = [];
    $items = scandir($input_dir);
    foreach ($items as $item) {
        if ($item === '.' || $item === '..') {
            continue;
        }
        $fullPath = $input_dir . DIRECTORY_SEPARATOR . $item;
        if (is_dir($fullPath)) {
            $models[] = $item;
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
function listAssessedEssays(string $input_dir, string $model): array {
    $essays = [];
    $modelPath = $input_dir . DIRECTORY_SEPARATOR . $model;
    $items = scandir($modelPath);
    foreach ($items as $item) {
        if ($item === '.' || $item === '..') {
            continue;
        }
        $fullPath = $modelPath . DIRECTORY_SEPARATOR . $item;
        if (is_dir($fullPath)) {
            $essays[] = $item;
        }
    }
    return $essays;
}

/**
 * Lists assessment files for a given essay in a model's directory.
 * @param string $input_dir Base directory containing model folders
 * @param string $model Model name
 * @param string $essay Essay name
 * @return array Array of assessment file paths (markdown files)
 */
function listEssayAssessments(string $input_dir, string $model, string $essay): array {
    $essayPath = $input_dir . DIRECTORY_SEPARATOR . $model . DIRECTORY_SEPARATOR . $essay;
    $assessments = glob("{$essayPath}/*.md");
    return $assessments;
}

/**
 * Extracts numeric score from an assessment file.
 * 
 * Line format example:
 * Total Score: 10/100 points
 * 
 * @param string $assessmentFile
 * @return int|null
 */
function extractScoreFromAssessmentFile(string $assessmentFile): ?int {
    $content = file_get_contents($assessmentFile);
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
function toMarkdown(array $data, string $model): string {
    $lines = [];
    $lines[] = "# Assessment Statistics for Model: {$model}";
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

    $lines[] = "";

    $lines[] = "## Summary Statistics";
    $lines[] = "";
    $allScores = [];
    $lines[] = "| Essay | Number of Assessments | Average Score | Min Score | Max Score |";
    $lines[] = "|-------|-----------------------|---------------|-----------|-----------|";
    foreach ($data as $essay => $scores) {
        $numAssessments = count($scores);
        $averageScore = $numAssessments > 0 ? array_sum($scores) / $numAssessments : 0;
        $minScore = $numAssessments > 0 ? min($scores) : 0;
        $maxScore = $numAssessments > 0 ? max($scores) : 0;
        $lines[] = "| {$essay} | {$numAssessments} | " . number_format($averageScore, 2) . " | {$minScore} | {$maxScore} |";
        $allScores = array_merge($allScores, $scores);
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

$models = getModelsList($input_dir);
$result = [];

foreach ($models as $model) {
    $result[$model] = [];
    echo "Model: " . $model . PHP_EOL;
    $essays = listAssessedEssays($input_dir, $model);
    foreach ($essays as $essay) {
        $result[$model][$essay] = [];
        $assessments = listEssayAssessments($input_dir, $model, $essay);
        foreach ($assessments as $assessmentFile) {
            $score = extractScoreFromAssessmentFile($assessmentFile);
            if ($score !== null) {
                $result[$model][$essay][] = $score;
            }
        }
        $count = count($assessments);
        echo " - " . $essay . " (" . $count . " assessments)" . PHP_EOL;
    }
}

foreach ($result as $model => $data) {
    $markdown = toMarkdown($data, $model);
    $outputFile = $input_dir . DIRECTORY_SEPARATOR . $model . "_assessment_stats.md";
    file_put_contents($outputFile, $markdown);
    echo "Statistics for model '{$model}' written to '{$outputFile}'" . PHP_EOL;
}

echo "All statistics generated." . PHP_EOL;