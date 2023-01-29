<?php

namespace app\Core;

use PDO;
use PDOException;
use app\Core\Interfaces\IDataBase;

class DataBase implements IDataBase
{
    private $conn;
    private static $instance;
    protected function __construct()
    {
        $this->connect();
    }
    protected function __clone()
    {
    }
    private function connect()
    {
        $serverName = $_ENV["DBSERVER"];
        $userName = $_ENV["DBUSER"];
        $password = $_ENV["DBPASSWORD"];
        $dbName = $_ENV["DBNAME"];

        try {
            $this->conn = new PDO("mysql:host=$serverName;dbname=$dbName", $userName, $password);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function find(string $table, string $keyField, int $id): array
    {
        $result = $this->conn->query("SELECT * FROM $table WHERE $keyField = $id")->fetchall(PDO::FETCH_ASSOC);
        return array_shift($result);
    }
    public function findAll(string $table): array
    {
        $result = $this->conn->query("SELECT * FROM $table")->fetchall(PDO::FETCH_ASSOC);
        return $result;
    }
    public function __destruct()
    {
        if ($this->conn != null) $this->conn = null;
    }
    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new static();
        }
        return self::$instance;
    }
}
