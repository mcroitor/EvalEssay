<?php

namespace Mc\Sql;

/**
 * SQL query builder.
 */
class Query {
    /**
     * supported commands
     */
    public const SELECT = "SELECT";
    public const INSERT = "INSERT";
    public const UPDATE = "UPDATE";
    public const DELETE = "DELETE";

    /**
     * query configuration parameters
     */
    public const TYPE = "type";
    public const TABLE = "table";
    public const FIELDS = "fields";
    public const VALUES = "values";
    public const WHERE = "where";
    public const ORDER = "order";
    public const GROUP = "group";
    public const LIMIT = "limit";

    protected const PATTERN = [
        self::SELECT => "SELECT %fields% FROM %table%%where%%order%%limit%",
        self::INSERT => "INSERT INTO %table% (%fields%) VALUES (%values%)",
        self::UPDATE => "UPDATE %table% SET %values%%where%",
        self::DELETE => "DELETE FROM %table%%where%",
    ];

    protected string $type = "";
    protected string $table = "";
    protected array $fields = [];
    protected array $values = [];
    protected array $where = [];
    protected array $order = [];
    protected array $limit = [];
    protected array $parameters = [];

    public function __construct(array $config){
        foreach ($config as $key => $value) {
            if(property_exists($this, $key)){
                $this->$key = $value;
            }
        }
    }

    /**
     * Get parameters for prepared statement
     * @return array
     */
    public function getParameters(): array {
        return $this->parameters;
    }

    /**
     * return query command type
     * @return string
     */
    public function getType(): string {
        return $this->type;
    }

    /**
     * create query for select
     * @return Query
     */
    public static function select(): Query{
        return new Query([
            self::TYPE => self::SELECT,
        ]);
    }

    /**
     * create query for insert
     * @return Query
     */
    public static function insert(): Query{
        return new Query([
            self::TYPE => self::INSERT,
        ]);
    }

    /**
     * create query for update
     * @return Query
     */
    public static function update(): Query{
        return new Query([
            self::TYPE => self::UPDATE,
        ]);
    }

    /**
     * create query for delete
     * @return Query
     */
    public static function delete(): Query{
        return new Query([
            self::TYPE => self::DELETE,
        ]);
    }

    /**
     * clone a query
     * @return Query
     */
    public function clone(): Query {
        $new_query = new Query([
            self::TYPE => $this->type,
            self::TABLE => $this->table,
            self::FIELDS => $this->fields,
            self::VALUES => $this->values,
            self::WHERE => $this->where,
            self::ORDER => $this->order,
            self::LIMIT => $this->limit,
        ]);
        $new_query->parameters = $this->parameters;
        return $new_query;
    }

    /**
     * set fields and return new query
     * @param array $fields
     * @return Query
     */
    public function fields(array $fields): Query {
        $result = $this->clone();
        $result->fields = $fields;
        return $result;
    }

    /**
     * set values and return new query
     * @param array $values
     * @return Query
     */
    public function values(array $values): Query {
        $result = $this->clone();
        $result->values = $values;
        return $result;
    }

    /**
     * set where conditions and return new query
     * @param array $where
     * @return Query
     */
    public function where(array $where): Query {
        $result = $this->clone();
        $result->where = $where;
        return $result;
    }

    /**
     * set order conditions and return new query
     * @param array $order
     * @return Query
     */
    public function order(array $order): Query {
        $result = $this->clone();
        $result->order = $order;
        return $result;
    }

    /**
     * set limit conditions and return new query
     * @param array $limit
     * @return Query
     */
    public function limit(int $limit, int $offset = 0): Query {
        $result = $this->clone();
        $result->limit = [
            'offset' => $offset,
            'limit' => $limit,
        ];
        return $result;
    }

    /**
     * set table and return new query
     * @param string $table
     * @return Query
     */
    public function table(string $table): Query {
        $result = $this->clone();
        $result->table = $table;
        return $result;
    }

    /**
     * return query string
     * @return string
     */
    public function build(): string {
        $this->parameters = [];
        
        $replace = [
            "%table%" => $this->table,
            "%fields%" => $this->buildFields(),
            "%values%" => $this->buildValues(),
            "%where%" => $this->buildWhere(),
            "%order%" => $this->buildOrder(),
            "%limit%" => $this->buildLimit(),
        ];
        return \trim(\strtr(self::PATTERN[$this->type], $replace));
    }

    /**
     * return fields string
     * @return string
     */
    protected function buildFields(): string {
        if(empty($this->fields)){
            return "*";
        }
        return \implode(", ", $this->fields);
    }

    /**
     * return values string
     * @return string
     */
    protected function buildValues(): string {
        if(empty($this->values)){
            return "";
        }
        
        if ($this->type === self::INSERT) {
            // For INSERT, use placeholders
            $placeholders = [];
            foreach ($this->values as $key => $value) {
                if (is_null($value)) {
                    $placeholders[] = "NULL";
                } else {
                    $param_name = "val_" . $key;
                    $this->parameters[$param_name] = $value;
                    $placeholders[] = ":{$param_name}";
                }
            }
            return \implode(", ", $placeholders);
        } else if ($this->type === self::UPDATE) {
            // For UPDATE, create SET clause with placeholders
            $set_parts = [];
            foreach ($this->values as $key => $value) {
                if (is_null($value)) {
                    $set_parts[] = "{$key} = NULL";
                } else {
                    $param_name = "set_" . $key;
                    $this->parameters[$param_name] = $value;
                    $set_parts[] = "{$key} = :{$param_name}";
                }
            }
            return \implode(", ", $set_parts);
        }
        
        // Fallback for other types
        return \implode(", ", $this->values);
    }

    /**
     * return where string
     * @return string
     */
    protected function buildWhere(): string {
        if(empty($this->where)){
            return "";
        }
        $tmp = [];
        $param_counter = count($this->parameters);
        
        foreach ($this->where as $key => $value) {
            if (is_numeric($key)) {
                // is a value rule, add as is
                $tmp[] = $value;
            } else if (is_null($value)) {
                // is null
                $tmp[] = "{$key} IS NULL";
            } else {
                // use placeholder
                $param_name = "param" . $param_counter++;
                $this->parameters[$param_name] = $value;
                $tmp[] = "{$key} = :{$param_name}";
            }
        }
        return " WHERE " . \implode(" AND ", $tmp);
    }

    /**
     * return order string
     * @return string
     */
    protected function buildOrder(): string {
        if(empty($this->order)){
            return "";
        }
        $tmp = [];
        foreach ($this->order as $key => $value) {
            $tmp[] = "{$key} {$value}";
        }
        return " ORDER BY " . \implode(", ", $tmp);
    }

    /**
     * return limit string
     * @return string
     */
    protected function buildLimit(): string {
        if(!$this->limit){
            return "";
        }
        $tmp = [];
        $tmp[] = "LIMIT " . $this->limit["limit"];
        if(isset($this->limit["offset"])){
            $tmp[] = "OFFSET " . $this->limit["offset"];
        }
        return " " . \implode(" ", $tmp);
    }

    /**
     * convert query object to string
     * @return string
     */
    public function __toString(): string {
        return $this->build();
    }
}
