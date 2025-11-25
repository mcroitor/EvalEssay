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

CREATE TABLE essays (
    essay_name TEXT UNIQUE,
    output_format TEXT,
    rubric TEXT,
    solution TEXT
);

CREATE TABLE responses (
    essay_name TEXT,
    response_id TEXT UNIQUE,
    response_text TEXT
);

CREATE TABLE outputs (
    model_name TEXT,
    essay_name TEXT,
    assignment_id INTEGER,
    output_text TEXT
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
        $count = $this->db->select('outputs', ["count(*) as CNT"], [
            'model_name' => $this->modelName,
            'essay_name' => $essayName
        ])[0]['CNT'];
        return $count;
    }

    public function getEssays(): array
    {
        $results = $this->db->selectColumn('essays', 'essay_name', [], []);
        return $results;
    }
    public function getAssessments(string $essayName): array
    {
        $results = $this->db->select(
            'outputs',
            ['assignment_id', 'output_text'],
            ['essay_name' => $essayName],
            ["offset" => 0, "limit" => 1000]
        );
        return $results;
    }

    public function getResponse(string $responseId): ?string
    {
        $result = $this->db->select(
            'responses',
            ['response_text'],
            ['response_id' => $responseId],
            ["offset" => 0, "limit" => 1]
        );
        if (empty($result)) {
            return null;
        }
        return $result[0]['response_text'];
    }

    public function insertEssay(string $essayName, string $outputFormat = "", string $rubric = "", string $solution = ""): void
    {
        if ($this->db->exists('essays', ['essay_name' => $essayName])) {
            // Essay already exists
            return;
        }
        // Insert essay
        $this->db->insert('essays', [
            'essay_name' => $essayName,
            'output_format' => $outputFormat,
            'rubric' => $rubric,
            'solution' => $solution
        ]);
    }

    public function insertResponse(string $essayName, string $responseId, string $responseText): void
    {
        if ($this->db->exists('responses', ['response_id' => $responseId])) {
            // Response already exists
            return;
        }
        // Insert response
        $this->db->insert('responses', [
            'essay_name' => $essayName,
            'response_id' => $responseId,
            'response_text' => $responseText
        ]);
    }

    public function insertOutput(string $essayName, int $assignmentId, string $outputText): void
    {
        // Insert output
        $this->db->insert('outputs', [
            'model_name' => $this->modelName,
            'essay_name' => $essayName,
            'assignment_id' => $assignmentId,
            'output_text' => $outputText
        ]);
    }
}
