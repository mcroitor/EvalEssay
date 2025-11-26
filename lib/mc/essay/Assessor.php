<?php

namespace mc\essay;

use mc\alpaca\OllamaClient;
use \mc\alpaca\OllamaResponse;

/**
 * Essay Assessment Service
 * 
 * This class provides automated essay assessment functionality using
 * Large Language Models. It coordinates between Task objects (which define
 * assignment requirements) and LLM clients to generate evaluations.
 * 
 * The Assessor acts as a service layer that orchestrates the assessment
 * process by building prompts from tasks and student submissions,
 * sending them to language models, and returning structured evaluations.
 * 
 * @package mc\essay
 * @author Mihail Croitor <mcroitor@gmail.com>
 * @version 1.0.0
 * @since 1.0.0
 * 
 * @example
 * ```php
 * $client = new OllamaClient('http://localhost:11434', 'llama3.2:latest');
 * $assessor = new Assessor($client);
 * 
 * $task = new Task($taskData, $template);
 * $evaluation = $assessor->assessEssay($task, $studentSubmission);
 * echo $evaluation; // LLM-generated assessment
 * ```
 */
class Assessor
{
    /**
     * Language model client for generating assessments
     * 
     * @var OllamaClient
     */
    private OllamaClient $llmClient;
    /**
     * HTTP request options for the LLM client (e.g., streaming, system role, model tuning).
     * 
     * @var array
     */
    private array $options = [];
    /**
     * Prompt template used for generating assessment prompts.
     * 
     * @var string
     */
    private string $template;

    /**
     * Initialize the assessment service
     * 
     * @param OllamaClient $llmClient Configured LLM client for generating assessments
     * @param string $template Prompt template for assessment
     */
    public function __construct(OllamaClient $llmClient, string $template)
    {
        $this->llmClient = $llmClient;
        $this->template = $template;
        $this->options = [
            'stream' => true,
            'system' => '',
            'options' => [
                'temperature' => 0.2,
                'top_p' => 0.9
            ]
        ];
    }

    /**
     * Assess a student essay using the configured language model
     * 
     * This method orchestrates the complete assessment process:
     * 1. Builds a structured assessment prompt from the task and student essay
     * 2. Sends the prompt to the language model via the LLM client
     * 3. Parses the response and extracts the assessment text
     * 4. Returns the evaluation for further processing or display
     * 
     * The assessment follows the rubric and criteria defined in the Task object,
     * ensuring consistent evaluation based on predefined standards.
     * 
     * @param \mc\essay\Task $task Task object containing assignment details and rubric
     * @param string $studentEssay The student's submission to be evaluated
     * @param bool $useStructured Whether to use structured prompt for custom models
     * 
     * @return string Generated assessment text from the language model
     * 
     * @throws \RuntimeException When LLM communication fails
     * @throws \InvalidArgumentException When studentEssay is empty
     * @throws \JsonException When LLM response parsing fails
     * 
     * @example
     * ```php
     * $taskData = [
     *     'task_name' => 'Creative Writing Assignment',
     *     'rubric' => '| Creativity | 10 |\n| Grammar | 5 |',
     *     'max_score' => 15
     * ];
     * $task = new Task($taskData, '');
     * $assessment = $assessor->assessEssay($task, "Once upon a time...");
     * // Returns: "Creativity: 8/10, Grammar: 4/5, Total: 12/15..."
     * ```
     */
    public function assessEssay(\mc\essay\Task $task, string $studentEssay): string
    {
        // Intentionally pass an empty string for $studentEssay to build only the system prompt.
        // The actual student essay is formatted and passed separately to the LLM client below.
        $this->options['system'] = $task->buildPrompt('', $this->template);

        $studentEssay = "## Student Response\n\n<student_response>{$studentEssay}</student_response>";

        $response = $this->llmClient->generate($studentEssay, $this->options);

        return $response;
    }
}