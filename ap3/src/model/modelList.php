<?php
namespace app\model;

use PDO;
use PDOException;
use app\core\Connection;

class modelList {
        private $Database;
    public function getMList(){
    try{
            $result = $this->conn->query("SELECT id,titulo,fecha_vencimiento FROM  tareas");
            /*Para obtener en formato de array asociativo*/
            return $result->fetchAll(PDO::FETCH_ASSOC); 
    } catch (PDOException $e) {
            echo 'Falló la consulta: ' . $e->getMessage();
    }
}
}
