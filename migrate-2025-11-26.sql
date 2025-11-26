-- update essays table to tasks
ALTER TABLE essays RENAME TO tasks;
ALTER TABLE tasks RENAME COLUMN essay_name TO task_name;

-- update responses table to essays
ALTER TABLE responses RENAME TO essays;
ALTER TABLE essays RENAME COLUMN essay_name TO task_name;
ALTER TABLE essays RENAME COLUMN response_id TO essay_name;
ALTER TABLE essays RENAME COLUMN response_text TO essay_text;

-- update outputs table to assessments
ALTER TABLE outputs RENAME TO assessments;
ALTER TABLE assessments RENAME COLUMN assignment_id TO assessment_id;
ALTER TABLE assessments RENAME COLUMN output_text TO assessment_text;