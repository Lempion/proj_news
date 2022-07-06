<?php

class Database
{
    private static $instance = null;
    private $pdo, $result, $query, $error = false;

    private function __construct()
    {
        $this->pdo = new PDO("mysql:host=" . Config::get('mysql.host') . ";dbname=" . Config::get('mysql.database'), Config::get('mysql.username'), Config::get('mysql.password'));
    }

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function query($sql, $params = [])
    {
        $this->error = false;
        $this->query = $this->pdo->prepare($sql);

        if (count($params)) {
            $i = 1;
            foreach ($params as $param) {
                $this->query->bindValue($i, $param);
                $i++;
            }
        }

        if (!$this->query->execute()) {
            $this->error = true;
        } else {
            $this->result = $this->query->fetchAll(PDO::FETCH_OBJ);

            $this->count = $this->query->rowCount();
        }

        return $this;
    }

    public function getOrderBy($table, $params)
    {
        $typeSorting = $params[0];
        $limit = $params[1];
        $offset = $params[2];

        $sql = "SELECT * FROM {$table} ORDER BY `idate` {$typeSorting} LIMIT {$limit} OFFSET {$offset}";
        return $this->query($sql);
    }

    public function getWhere($table, $params)
    {
        $operators = ['>', '<', '=', '<=', '>='];

        $filed = $params[0];
        $operator = $params[1];
        $value = $params[2];

        if (in_array($operator, $operators)) {
            $sql = "SELECT * FROM {$table} WHERE {$filed} {$operator} ?";

            return $this->query($sql, array($value));
        }
        return false;
    }

    public function countTableRow($table)
    {
        $sql = "SELECT COUNT(1) FROM {$table}";
        return $this->query($sql);
    }

    public function result()
    {
        return $this->result;
    }

    public function error()
    {
        return $this->error;
    }

    public function first()
    {
        return $this->result[0];
    }
}