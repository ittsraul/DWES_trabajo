<?php

namespace app\Core;

use Doctrine\ORM\ORMSetup;
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager as Em;

class EntityManager{
    private $em;
    private $dbConfig;
    function __construct()
    {

        $this->dbConfig = json_decode(file_get_contents(__DIR__ . "/../../config/" . $_ENV["DBCONFIGFILE"]), true);
        $paths = [__DIR__."/../Entity"];
        $isDevMode = false;
        
        // the connection configuration
        $dbParams = [
            'driver'   => 'pdo_mysql',
            'user'     => $this->dbConfig["user"],
            'password' =>  $this->dbConfig["password"],
            'dbname'   => $this->dbConfig["dbname"],
            'host'      => $this->dbConfig["server"],
        ];

        $config = ORMSetup::createAttributeMetadataConfiguration($paths, $isDevMode);
        $connection = DriverManager::getConnection($dbParams, $config);
        $this-> em = new Em($connection, $config);
        
        
    }

    public function getEm(){
        return $this->em;
    }
}