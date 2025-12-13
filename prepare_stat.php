<?php

require_once __DIR__ . "/lib/autoload.php";

use \mc\Sql\Database;
use \mc\essay\Report;

/// <<< FUNCTIONS

/**
 * Calculates average of an array of numbers.
 * @param array $numbers
 * @return float
 */
function average(array $numbers): float
{
    return count($numbers) === 0 ? 0 : array_sum($numbers) / count($numbers);
}

/**
 * Calculates standard deviation of an array of numbers.
 * @param array $numbers
 * @return float
 */
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
 * Reads directory on lists of database files.
 * Reads the model name from each database.
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
            \mc\Logger::stdout()->warn("[Warning] Could not read model from database file '{$file}': " . $e->getMessage());
        }
    }
    return $models;
}

/**
 * Each model has its own database file, that contains
 * assessments for multiple essays.
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
 * Lists essay assessments.
 * @param string $input_dir Base directory containing model database
 * @param string $model Model name
 * @param string $essay Essay name
 * @return array Array of assessments data
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
 *      'essay_name'  => <essay name>,
 *      'assessment_id' => <id>,
 *      'assessment_text' => <text>
 * ]
 * 
 * Line format example:
 * Total Score: 10/100 points
 * 
 * @param array $assessment
 * @return int|null
 */
function extractScore(array $assessment): ?int
{
    $content = $assessment['assessment_text'];
    $matches = [];
    $patterns = [
        '/Total Score: ([0-9]+)\/100/',
        '/([0-9]+)\/100/',
    ];
    
    foreach ($patterns as $pattern) {
        if (preg_match($pattern, $content, $matches)) {
            return intval($matches[1]);
        }
    }
    \mc\Logger::stdout()->warn("Could not extract score from assessment ID {$assessment['assessment_id']}, essay '{$assessment['essay_name']}'");
    return null;
}

function updateScore(string $input_dir, string $model, string $essayName, int $score, int $sum): void{
    $report = new Report($input_dir, $model);
    $report->updateAssessmentScore($essayName, $score, $sum);
}

/**
 * Extracts criteria scores from an assessment.
 * @param array $assessment
 * @return array scores
 */
function extractCriteriaScores(array $assessment): array
{
    $content = $assessment['assessment_text'];
    $scores = [];
    if (preg_match_all('/ \|\s+([0-9]+)\s+\|/', $content, $matches, PREG_SET_ORDER)) {
        foreach ($matches as $match) {
            $scores[] = intval($match[1]);
        }
    } else {
        \mc\Logger::stdout()->warn("Could not extract criteria scores from assessment ID {$assessment['assessment_id']}, essay '{$assessment['essay_name']}'");
    }
    return $scores;
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

\mc\Logger::stdout()->info("Preparing assessment statistics...");

$input_dir = __DIR__ . "/data/output";

if (!is_dir($input_dir)) {
    \mc\Logger::stdout()->error("Input directory '{$input_dir}' not found.");
    exit(1);
}

\mc\Logger::stdout()->info("Input directory: {$input_dir}");
$models = getModelsList($input_dir);
\mc\Logger::stdout()->info("Found " . count($models) . " models.");

$result = [];

foreach ($models as $model) {
    $result[$model] = [];
    \mc\Logger::stdout()->info("Model: " . $model);
    $essays = listAssessedEssays($input_dir, $model);
    foreach ($essays as $essay) {
        $result[$model][$essay] = [];
        $assessments = listEssayAssessments($input_dir, $model, $essay);
        foreach ($assessments as $assessment) {
            $score = extractScore($assessment) ?? 0;
            $result[$model][$essay][$assessment['assessment_id']] = $score;
            $criteriaScores = extractCriteriaScores($assessment);
            $sum = array_sum($criteriaScores);
            if($score !== $sum) {
                \mc\Logger::stdout()->warn("Mismatch in criteria scores sum for assessment ID {$assessment['assessment_id']}, essay '{$assessment['essay_name']}'");
            }
            updateScore($input_dir, $model, $assessment['essay_name'], $score, $sum);
        }
        $count = count($assessments);
        \mc\Logger::stdout()->info(" - " . $essay . " (" . $count . " assessments)");
    }
}

foreach ($result as $model => $data) {
    $markdown = toMarkdown($data, $model);
    $filename = str_replace([":", ".", "/"], "_", $model);
    $outputFile = $input_dir . DIRECTORY_SEPARATOR . $filename . "_assessment_stats.md";
    file_put_contents($outputFile, $markdown);
    \mc\Logger::stdout()->info("Statistics for model '{$model}' written to '{$outputFile}'");
}

\mc\Logger::stdout()->info("All statistics generated.");
