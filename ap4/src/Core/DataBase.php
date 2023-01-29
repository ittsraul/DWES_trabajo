<?php

namespace app\Core;

use PDO;
use PDOException;
use app\Core\Interfaces\IDataBase;

class DataBase implements IDataBase
{
    private $dbConfig;
    private $conn;
    private static $instance;
    protected function __construct()
    {
        //exit($_ENV["DBCONFIGFILE"]);
        $this->dbConfig = json_decode(file_get_contents(__DIR__ . "/../../config/" . $_ENV["DBCONFIGFILE"]), true);
        $this->connect();
    }
    protected function __clone()
    {
    }
    private function connect()
    {
        $serverName = $this->dbConfig["server"];
        $userName = $this->dbConfig["user"];
        $password = $this->dbConfig["password"];
        $dbName = $this->dbConfig["dbname"];

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
