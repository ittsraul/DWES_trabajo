<?php
//uso de namespaces
use app\controller\{controllerList,controllerTotal};

//Clase que vamos a utilizar
class dispatcher
{
    //Tenemos un constructor para que pasar la accion y el id
    function __construct($accion, $identificador)
    {
        $accion = $this->accion;
        $identificador = $this->identificador;
    }

    //Funcion que cambia el contenido mediante variables de sesion
    function recambioD()
    {
        //mediante variables de session
        $className = "ClaseEjemplo". $_SESSION[""];
        //Nuevo objecto
        $obj = new $className;
        $methodName = "metodoEjemplo";
        //Llamamos al metodo con el objeto
        $obj->$methodName(); 
    }
}
