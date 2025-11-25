# Data Output Format

THe data is stored in the Sqlite database located at `data/output/*.db`. For each LLM run, a new database file is created with a LLM name.

The database contains the following tables:

```sql
CREATE TABLE model (
    name TEXT UNIQUE
);

CREATE TABLE essays (
    essay_name TEXT UNIQUE
);

CREATE TABLE runs (
    model_name TEXT,
    start_time DATETIME,
    end_time DATETIME
);

CREATE TABLE outputs (
    model_name TEXT,
    essay_name TEXT,
    assignment_id INTEGER,
    output_text TEXT
);
```
