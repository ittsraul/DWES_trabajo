<?php
// bootstrap.php

namespace app\Core;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

class DoctrineBootStrap
{
    public function __invoke(): EntityManager
    {
        // Create a simple "default" Doctrine ORM configuration for Attributes
        $config = ORMSetup::createAttributeMetadataConfiguration(
            paths: [__DIR__ . "/../"],
            isDevMode: true,
        );

        // database configuration parameters
        $dbConfig = json_decode(file_get_contents(__DIR__ . "/../../config/" . $_ENV["DBCONFIGFILE"]), true);

        $conn = [
            'driver' => 'pdo_mysql',
            'host' => $dbConfig["server"],
            'user' => $dbConfig["user"],
            'password' => $dbConfig["password"],
            'dbname' => $dbConfig["dbname"]
        ];

        // obtaining the entity manager
        return EntityManager::create($conn, $config);
    }
}
