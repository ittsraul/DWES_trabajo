<?php

namespace app\core;

//Tenemos que utilizar use PDO/PDOException porque son funciones nativas de php y no están dentro de estos namespaces

use PDO;
use PDOException;

//Clase conexion
class Connection
{
    //variable protegida $conn
    protected $conn;
    private $dBConf;
    //funcion conexion a base de datos
    public function __construct()
    {
        //ruta que cogerá el fichero de configuracion json.
        //json decode passa json a a la variable dbData
        $this->dBConf = json_decode(file_get_contents(__DIR__ . "/../../config/db.json"), true);
        $this->connect();
    }

    public function connect()
    {
        //almacenamos la información de la conexión en variables
        $servername = $this->dBConf["servername"];
        $username = $this->dBConf["username"];
        $password = $this->dBConf["password"];
        $db = $this->dBConf["db"];

        //Establece la conexión
        try {
            $this->conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connection has failed: ' . $e->getMessage();
        }
    }
 
    //desconector con valor nulo
    public function disconnect()
    {
        $this->conn = null;
    }

    //destructor de la conexion llama a el desconector.
    public function __destruct()
    {
        $this->disconnect();
    } 
}
