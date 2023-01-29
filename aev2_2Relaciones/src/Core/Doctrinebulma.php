<?php

namespace app\Core;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

class Doctrinebulma{
    private $em;
    function __construct()
    {
        //Creacion de la configuracion de atributos de doctrin por defecto.
        $config = ORMSetup::createAttributeMetadataConfiguration(
                    paths: [__DIR__ . "/../"],
                    isDevMode: true,
        );

        //Configuracion base de datos
        $dbConfig = json_decode(file_get_contents(__DIR__."/../../config/" . $_ENV["DBCONFIGFILE"]), true);
        
        $conn = [
            'driver' => 'pdo_mysql',
            'user' => $dbConfig["user"],
            'password' => $dbConfig["password"],
            'dbname' => $dbConfig["dbname"],
            'host' => $dbConfig["server"]
        ];
       
        //Obtencion del entity manager
        $this->em = EntityManager::create($conn, $config);
    }
    public function getEm(){
        return $this->em;
    }   
}