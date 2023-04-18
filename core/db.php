<?php
require 'config.php';



class DB
{
    private $conn;
    private $stmt;


    public function __construct()
    {
        try {
            $dsn = "mysql:host=$GLOBALS[db_host];port=$GLOBALS[db_port];dbname=$GLOBALS[db_name]";

            // set the PDO error mode to exception
            $options = [
                PDO::ATTR_ERRMODE => true,
                PDO::ERRMODE_EXCEPTION => PDO::ERRMODE_EXCEPTION
            ];

            $conn = new PDO($dsn, $GLOBALS['db_username'], $GLOBALS['db_password'], $options);
            $this->conn= $conn;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            die;
        }
    }

    public function query($sql)
    {
        $stmt = $this->conn->prepare($sql);
        return $stmt;
    }
    public function queryRun($sql)
    {
        $this->stmt =$this->conn->prepare($sql);
    }

    public function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }
    public function execute()
    {
        return $this->stmt->execute();
    }
}