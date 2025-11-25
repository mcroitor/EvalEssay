<?php

namespace Mc\Sql;

use Mc\Sql\Query;

/**
 * PDO wrapper
 *
 * @author Croitor Mihail <mcroitor@gmail.com>
 */
class Database
{

    public const LIMIT1 = [
        'limit' => 1,
        'offset' => 0
    ];
    public const LIMIT10 = [
        'limit' => 10,
        'offset' => 0
    ];
    public const LIMIT20 = [
        'limit' => 20,
        'offset' => 0
    ];
    public const LIMIT100 = [
        'limit' => 100,
        'offset' => 0
    ];

    public const ALL = ["*"];

    private $pdo;

    public function __construct(string $dsn, ?string $login = null, ?string $password = null)
    {
        try {
            $this->pdo = new \PDO($dsn, $login, $password);
        } catch (\Exception $ex) {
            die("DB init Error: " . $ex->getMessage() . ", DSN = {$dsn}");
        }
    }

    /**
     * Close connection. After this queries are invalid and object recreating is obligatory.
     */
    public function close()
    {
        $this->pdo = null;
    }

    /**
     * Common query method
     * @param string $query
     * @param string $error
     * @param bool $need_fetch
     * @return array
     */
    public function query(string $query, string $error = "Error: ", bool $need_fetch = true): array
    {
        $array = [];
        try {
            $result = $this->pdo->query($query);
            if ($result === false) {
                $aux = "{$error} {$query}: "
                    . $this->pdo->errorInfo()[0]
                    . " : "
                    . $this->pdo->errorInfo()[1]
                    . ", message = "
                    . $this->pdo->errorInfo()[2];
                exit($aux);
            }
            if ($need_fetch) {
                $array = $result->fetchAll(\PDO::FETCH_ASSOC);
            }
        } catch (\PDOException $ex) {
            exit($ex->getMessage() . ", query: " . $query);
        }
        return $array;
    }

    /**
     * Method for dump parsing and execution
     * @param string $dump
     */
    public function parseSqlDump(string $dump)
    {
        if (\file_exists($dump)) {
            $data = file_get_contents($dump);
            $this->execSqlDump($data);
        }
    }

    public function execSqlDump(string $sql)
    {
        $sql = \str_replace(["\n\r", "\r\n", "\n\n"], "\n", $sql);
        $queries = \explode(";", $sql);
        foreach ($queries as $query) {
            $query = $this->stripSqlComment(trim($query));
            if ($query != '') {
                $this->query($query, "parse error:", false);
            }
        }
    }

    /**
     * Method that removes SQL comments, used for dump execution.
     * @param string $string
     * @return string
     */
    private function stripSqlComment(string $string = ''): string
    {
        $RXSQLComments = '@(--[^\r\n]*)|(/\*[\w\W]*?(?=\*/)\*/)@ms';
        return (empty($string) ? '' : \preg_replace($RXSQLComments, '', $string));
    }

    private function parseWhere(array $where)
    {
        $tmp = [];
        foreach ($where as $key => $value) {
            if (is_numeric($key)) {
                // is a value rule, add as is
                $tmp[] = $value;
            } else if (is_null($value)) {
                // is null
                $tmp[] = "{$key} is null";
            } else {
                // quote all other
                $value = $this->pdo->quote($value);
                $tmp[] = "{$key}=$value";
            }
        }
        return $tmp;
    }

    /**
     * Simplified selection.
     * @param string $table
     * @param array $data enumerate columns for selection. Sample: ['id', 'name'].
     * @param array $where associative conditions.
     * @param array $limit definition sample: ['offset' => '1', 'limit' => '100'].
     * @return array
     */
    public function select(string $table, array $data = ['*'], array $where = [], array $limit = []): array
    {
        $fields = \implode(", ", $data);

        if(empty($limit)) {
            $limit = self::LIMIT100;
        }
        if(empty($limit['offset'])) {
            $limit['offset'] = 0;
        }
        if(empty($limit['limit'])) {
            $limit['limit'] = 100;
        }

        $query = "SELECT {$fields} FROM {$table}";
        if (!empty($where)) {
            $query .= " WHERE " . \implode(" AND ", $this->parseWhere($where));
        }
        if (!empty($limit)) {
            $query .= " LIMIT {$limit['offset']}, {$limit['limit']}";
        }
        return $this->query($query);
    }

    /**
     * select column from table
     * @param string $table
     * @param string $column_name column name for selection.
     * @param array $where associative conditions.
     * @param array $limit definition sample: ['offset' => '1', 'limit' => '100'].
     */
    public function selectColumn(string $table, string $column_name, array $where = [], array $limit = []): array
    {
        $tmp = $this->select($table, [$column_name], $where, $limit);
        $result = [];
        foreach ($tmp as $value) {
            $result[] = $value[$column_name];
        }
        return $result;
    }

    /**
     * Delete rows from table <b>$table</b>. Condition is required.
     * @param string $table
     * @param array $conditions
     * @return array
     */
    public function delete(string $table, array $conditions): array
    {
        $query = "DELETE FROM {$table} WHERE " . \implode(" AND ", $this->parseWhere($conditions));
        return $this->query($query, "Error: ", false);
    }

    /**
     * Update fields <b>$values</b> in table <b>$table</b>. <b>$values</b> and
     * <b>$conditions</b> are required.
     * @param string $table
     * @param array $values
     * @param array $conditions
     * @return array
     */
    public function update(string $table, array $values, array $conditions): array
    {
        $tmp2 = [];
        foreach ($values as $key => $value) {
            $value = $this->pdo->quote($value);
            $tmp2[] = "{$key}={$value}";
        }

        $query = "UPDATE {$table} SET " . \implode(", ", $tmp2) . " WHERE " . implode(" AND ", $this->parseWhere($conditions));
        return $this->query($query, "Error: ", false);
    }

    /**
     * insert values in table, returns id of inserted data.
     * @param string $table
     * @param array $values
     * @return string|false
     */
    public function insert(string $table, array $values): string|false
    {
        $columns = \implode(", ", \array_keys($values));
        // quoting values
        $quoted_values = \array_values($values);
        foreach ($quoted_values as $key => $value) {
            if (is_null($value)) {
                $quoted_values[$key] = "null";
            }
            else {
                $quoted_values[$key] = $this->pdo->quote($value);
            }
        }
        $data = \implode(",  ", $quoted_values);
        $query = "INSERT INTO {$table} ($columns) VALUES ({$data})";
        $this->query($query, "Error: ", false);
        return $this->pdo->lastInsertId();
    }

    /**
     * Check if exists row with value(s) in table.
     * @param string $table
     * @param array $where
     * @return bool
     */
    public function exists(string $table, array $where): bool
    {
        $result = $this->select($table, ["count(*) as count"], $where);
        return !empty($result) && $result[0]["count"] > 0;
    }

    /**
     * Select unique values from column.
     * @param string $table
     * @param string $column
     */
    public function uniqueValues(string $table, string $column): array
    {
        return $this->query("SELECT {$column} FROM {$table} GROUP BY {$column}");
    }

    /**
     * count unique values from column. Result is an array of elements {<column_value>, <count>}
     * @param string $table
     * @param string $column
     * @return array
     */
    public function countUniqueValues(string $table, string $column): array
    {
        return $this->query("SELECT {$column}, count({$column}) AS count FROM {$table} GROUP BY {$column}");
    }

    /**
     * Execute a query object using prepared statements.
     * @param Query $query
     * @return array
     */
    public function execPrepared(Query $query): array
    {
        $sql = $query->build();
        $parameters = $query->getParameters();
        
        try {
            $stmt = $this->pdo->prepare($sql);
            $result = $stmt->execute($parameters);
            
            if ($result === false) {
                $error = "Error executing prepared statement: " . implode(", ", $stmt->errorInfo());
                throw new \PDOException($error);
            }
            
            if ($query->getType() === Query::SELECT) {
                return $stmt->fetchAll(\PDO::FETCH_ASSOC);
            }
            
            return [];
        } catch (\PDOException $ex) {
            throw new \PDOException("Database error: " . $ex->getMessage() . ", SQL: " . $sql);
        }
    }

    /**
     * Execute a query object.
     * @param Query $query
     * @return array
     */
    public function exec(Query $query): array
    {
        // Use prepared statements if query has parameters
        if (!empty($query->getParameters())) {
            return $this->execPrepared($query);
        }
        
        return $this->query($query->build(), "Error: ", $query->getType() === Query::SELECT);
    }
}
