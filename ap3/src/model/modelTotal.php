<?php
namespace app\model;

use PDO;
use PDOException;
use app\core\Connection;

//Extends de connection porque recuerre a la bbdd
class modelTotal extends Connection{
    public function getTDetail(?int $id){
        //He usado el try y catch simplemente como metodo de comprovacion
            try{
                    $result = $this->conn->query("SELECT * FROM  tareas where id=$id");
                    /*Para obtener en formato de array asociativo usamos el fetch assoc, pero para que solo nos pase el que queremos, y no todos le pediremos con fetch asecas*/
                    return $result->fetch(PDO::FETCH_ASSOC); 

                    //Por si falla el catch con el error que quiero sacar
            } catch (PDOException $e) {
                    echo 'Falló la consulta: ' . $e->getMessage();
            }
        }
    }
?>