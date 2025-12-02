<?php

namespace mc\essay;

/**
 * Essay Task Management Class
 * 
 * This class represents an educational assignment task and handles
 * the generation of assessment prompts for language models. It manages
 * task metadata, rubrics, and template processing for automated essay evaluation.
 * 
 * The Task class uses a template system to generate structured prompts
 * that include task descriptions, evaluation rubrics, and student responses
 * for consistent LLM-based assessment.
 * 
 * @package mc\essay
 * @author Mihail Croitor <mcroitor@gmail.com>
 * @version 1.0.0
 * @since 1.0.0
 * 
 * @example
 * ```php
 * $taskData = [
 *     'name' => 'Docker Assignment',
 *     'description' => 'Create a docker-compose.yml file',
 *     'rubric' => '| Criterion | Max Score |\n|-----------|-----------|',
 *     'solution' => ""
 * ];
 * $task = new Task($taskData);
 * $prompt = $task->buildPrompt($studentEssay);
 * ```
 */
class Task
{
    /**
     * Name of the assignment task
     * 
     * @var string
     */
    private string $name;
    
    /**
     * Evaluation rubric in markdown table format
     * 
     * @var string
     */
    private string $rubric;
    
    /**
     * Detailed description of the task requirements
     * 
     * @var string
     */
    private string $description;
    
    /**
     * Output format for the assessment
     * 
     * @var string
     */
    private string $output_format;
    
    /**
     * Prompt template for the assessment
     * 
     * @var string
     */
    private string $prompt_template;

    /**
     * Path to the essay input files
     * 
     * @var string
     */
    private string $essay_path;

    /**
     * Initialize a new Task instance
     * 
     * Creates a task object with configuration data and optional custom template.
     * If task data is incomplete, sensible defaults are used.
     * 
     * @param array $task Associative array containing task configuration:
     *                   - 'name' (string): Name of the assignment
     *                   - 'description' (string): Task description
     *                   - 'rubric' (string): Evaluation rubric in markdown
     *                   - 'input' (string): input path for essays
     *                   - 'prompt_template' (string): Prompt template for assessment
     *                   - 'output_format' (string): Expected output format
     * 
     * @throws \InvalidArgumentException When task array is malformed
     */
    public function __construct(array $task)
    {
        $this->name = $task['name'] ?? 'A task';
        $this->description = $task['description'] ?? '';
        $this->rubric = $task['rubric'] ?? '';
        $this->output_format = $task['output_format'] ?? '';
        $this->prompt_template = $task['prompt_template'] ?? '';
        $this->essay_path = $task['input'] ?? '/input/';
    }

    /**
     * Get the task name
     * 
     * @return string The configured task name
     */
    public function getName(): string
    {
        return $this->name;
    }
    
    /**
     * Get the evaluation rubric
     * 
     * @return string The rubric in markdown table format
     */
    public function getRubric(): string
    {
        return $this->rubric;
    }
    
    /**
     * Get the task description
     * 
     * @return string The detailed task description
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Get output format
     */
    public function getOutputFormat(): string
    {
        return $this->output_format;
    }

    /**
     * Get essay input path
     */
    public function getEssayPath(): string
    {
        return $this->essay_path;
    }

    /**
     * Build assessment prompt for language model
     * 
     * This method processes the prompt template by replacing all placeholder
     * variables with actual task data and student submission. The resulting
     * prompt is ready to be sent to a language model for assessment.
     * 
     * @param string $studentEssay The student's submission to be evaluated
     * 
     * @return string Complete assessment prompt ready for LLM
     * 
     * @throws \InvalidArgumentException When studentEssay is empty
     */
    public function buildPrompt(string $studentEssay): string
    {
        $prompt = $this->prompt_template;

        $from = [
            "{{task_name}}",
            "{{student_response}}",
            "{{rubric}}",
            "{{task_description}}",
            "{{output_format}}"
        ];
        $to = [
            $this->name,
            $studentEssay,
            $this->rubric,
            $this->description,
            $this->output_format
        ];
        $prompt = str_replace($from, $to, $prompt);

        return $prompt;
    }
}
