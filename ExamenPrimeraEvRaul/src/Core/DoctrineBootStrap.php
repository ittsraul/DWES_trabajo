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
        $conn = [
            'driver' => 'pdo_mysql',
            'host' => $_ENV["DBSERVER"],
            'user' => $_ENV["DBUSER"],
            'password' => $_ENV["DBPASSWORD"],
            'dbname' => $_ENV["DBNAME"]
        ];

        // obtaining the entity manager
        return EntityManager::create($conn, $config);
    }
}
