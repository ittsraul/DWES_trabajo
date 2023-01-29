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
        //exit($_ENV["DBCONFIGFILE"]);
        
        $this->connect();
    }
    protected function __clone()
    {
    }
    private function connect()
    {
        $serverName = $_ENV["SERVER"]; 
        $userName = $_ENV["USER"];
        $password = $_ENV["PASSWORD"];
        $dbName = $_ENV["DBNAME"];

       try {
            $this->conn = new PDO("mysql:host=$serverName;dbname=$dbName", $userName, $password);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function executeSQL(string $sql): array
    {
        return $this->conn->query($sql)->fetchall(PDO::FETCH_ASSOC);
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
