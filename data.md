# Data Output Format

THe data is stored in the Sqlite database located at `data/output/*.db`. For each LLM run, a new database file is created with a LLM name.

The database contains the following tables:

```sql
-- keep correct model name
CREATE TABLE model (
    name TEXT UNIQUE
);

-- keep list of tasks
CREATE TABLE tasks (
    task_name TEXT UNIQUE,
    output_format TEXT,
    rubric TEXT,
    solution TEXT
);

-- student responses
CREATE TABLE essays (
    task_name TEXT,
    essay_name TEXT UNIQUE,
    essay_text TEXT
);

-- AI assessments
CREATE TABLE assessments (
    model_name TEXT,
    essay_name TEXT,
    assessment_id INTEGER,
    assessment_text TEXT
);
```
