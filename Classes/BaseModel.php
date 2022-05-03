<?php

require_once base_app("connect.php");

class BaseModel
{
    protected $conn;
    protected string $table;
    protected array $fillable = array();
    protected array $data = array();
    protected array $hiddenFields = array();
    protected array $wheres = array();

    public function __construct()
    {
        $this->conn = createConnection();
        $this->table = strtolower(get_class($this));
    }

    public function all()
    {
        $q =  "select * from {$this->table}";
        return $this->conn->query($q);
    }
    public function insert($data = [])
    {
        $query = "insert into {$this->table}(";
        foreach ($data as $key => $value) {
            $query .= $key . ",";
        }
        if(!$this->exitstCreatedAtField($data)) {
            $query .= "ngay_tao,";
        }
        $query = trim($query, ',');
        $query .= ") values (";
        foreach ($data as $key => $value) {
            if(is_string($value)) {
                $query .= "'" . $value . "',";
            } else {
                $query .= $value . ",";
            }
        }
        if(!$this->exitstCreatedAtField($data)) {
            $query .= "'" . date("Y/m/d") . "',";
        }
        $query = trim($query, ',') . ")";
        try {
            if($this->conn->query($query)) {
                $this->id = $this->conn->insert_id;
                return $this->conn->insert_id;
            } else {
                var_dump($this->conn->error);
            }
        } catch (Exception $ex) {

        }
    }
    public function where($data = [])
    {
        $query = "select * from {$this->table} where ";
        foreach ($data as $key => $value) {
            if(is_string($value)) {
                $query .= $key . " = '" . $value . "' AND ";
            } else {
                $query .= $key . " = " . $value . " AND ";
            }
        }
        $query = trim($query, "AND ");
        $result = $this->conn->query($query);
        if($result->num_rows > 0) {
            $rows = [];
            while($row = $result->fetch_assoc()) {
                array_push($rows, $row);
            }
            return $rows;
        } else {
            return [];
        }
    }
    public function get()
    {

    }
    protected function exitstCreatedAtField($value) {
        return array_key_exists('ngay_tao', array_flip($this->fillable)) && array_key_exists('ngay_tao', $value);
    }
    public function __set($name, $value)
    {
        if(!in_array($name, $this->fillable)) {
            $trace = debug_backtrace();
            trigger_error(
                'Thuộc tính : ' . $name . ' không tìm thấy trong $fillable' .
                ' in ' . $trace[0]['file'] .
                ' on line ' . $trace[0]['line'],
                E_USER_NOTICE);

        } else {
            $this->data[$name] = $value;
        }
    }
    public function &__get($name)
    {
        if(array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }
        $trace = debug_backtrace();
        trigger_error(
            'Undefined property via __get(): ' . $name .
            ' in ' . $trace[0]['file'] .
            ' on line ' . $trace[0]['line'],
            E_USER_NOTICE);
    }
    public function __isset($name)
    {
        return isset($this->data[$name]);
    }
    public function __unset($name)
    {
        unset($this->data[$name]);
    }
    public function toArray($data): array
    {
        $results = [];
        foreach ($this->fillable as $key) {
            $results[] = [
                $key => $data[$key]
            ];
        }
        return $results;
    }
}