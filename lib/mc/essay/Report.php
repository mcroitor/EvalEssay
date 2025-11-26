<?php

namespace mc\essay;

use mc\Sql\Database;

/**
 * This class writes assessment data in the SQLite database.
 */
class Report
{
    private const string INIT_SQL = "CREATE TABLE model (
    name TEXT UNIQUE
);

CREATE TABLE tasks (
    task_name TEXT UNIQUE,
    output_format TEXT,
    rubric TEXT,
    solution TEXT
);

CREATE TABLE essays (
    task_name TEXT,
    essay_name TEXT UNIQUE,
    essay_text TEXT
);

CREATE TABLE assessments (
    model_name TEXT,
    essay_name TEXT,
    assessment_id INTEGER,
    assessment_text TEXT
);";

    private Database $db;
    private string $modelName;
    private string $storagePath;
    private string $filename;

    public function __construct(string $storagePath, string $modelName)
    {
        $this->storagePath = $storagePath;
        $this->modelName = $modelName;
        $this->filename = str_replace([":", ".", "/"], "_", $modelName);
        $path = $this->storagePath . "/{$this->filename}_report.db";
        if (!file_exists($path)) {
            $this->initializeDatabase();
        }
        $this->db = new Database("sqlite:{$path}");
    }

    private function initializeDatabase(): void
    {
        $path = $this->storagePath . "/{$this->filename}_report.db";
        $db = new Database("sqlite:{$path}");
        $db->execSqlDump(self::INIT_SQL);

        $db->insert('model', ['name' => $this->modelName]);
    }

    public function getModelName(): string
    {
        return $this->modelName;
    }

    public function getStoragePath(): string
    {
        return $this->storagePath;
    }

    public function getFilename(): string
    {
        return $this->filename;
    }

    public function getDatabase(): Database
    {
        return $this->db;
    }

    public function getNumberOfAssessments(string $essayName): int
    {
        $count = $this->db->select(
            'assessments',
            ["count(*) as CNT"],
            [
                'model_name' => $this->modelName,
                'essay_name' => $essayName
            ]
        )[0]['CNT'];
        return $count;
    }

    public function getAssessments(string $essayName): array
    {
        $results = $this->db->select(
            'assessments',
            ['*'],
            ['essay_name' => $essayName],
            ["offset" => 0, "limit" => 1000]
        );
        return $results;
    }

    public function getTasks(string $taskId): ?string
    {
        $result = $this->db->select(
            'tasks',
            ['*'],
            ['task_id' => $taskId],
            ["offset" => 0, "limit" => 1]
        );
        if (empty($result)) {
            return null;
        }
        return $result[0];
    }

    public function insertTask(string $taskName, string $outputFormat = "", string $rubric = "", string $solution = ""): void
    {
        if ($this->db->exists('tasks', ['task_name' => $taskName])) {
            // task already exists
            return;
        }
        // Insert task
        $this->db->insert('tasks', [
            'task_name' => $taskName,
            'output_format' => $outputFormat,
            'rubric' => $rubric,
            'solution' => $solution
        ]);
    }

    public function getEssays(): array
    {
        $results = $this->db->selectColumn('essays', 'essay_name', [], []);
        return $results;
    }

    public function insertEssay(string $taskName, string $essayName, string $essayText): void
    {
        if ($this->db->exists('essays', ['essay_name' => $essayName])) {
            // Response already exists
            return;
        }
        // Insert response
        $this->db->insert('essays', [
            'task_name' => $taskName,
            'essay_name' => $essayName,
            'essay_text' => $essayText
        ]);
    }

    public function insertAssessment(string $essayName, int $assessmentId, string $assessmentText): void
    {
        // Insert output
        $this->db->insert('assessments', [
            'model_name' => $this->modelName,
            'essay_name' => $essayName,
            'assessment_id' => $assessmentId,
            'assessment_text' => $assessmentText
        ]);
    }
}
