<?php

require_once base_app("connect.php");

class BaseModel
{
    protected $conn;
    protected string $table;
    protected array $fillable = array();
    protected array $data = array();

    public function __construct()
    {
        $this->conn = createConnection();
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
}