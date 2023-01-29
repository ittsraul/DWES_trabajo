<?php

//Require del autoloader, el cual esta configurado para buscar en el sitio o a partir del sitio que se le ha indicado
require_once "../vendor/autoload.php";

//Mediante variables de sesion
session_start();

$remplazar = 
/* 
//Le pasaremos la accion
$accion = $_GET["action"];
//Switch de la accion que le llegue
switch ($accion) {

    //Caso detalle
    case 'detail':
        //Y tambien el id
        $identificador = $_GET["id"];

        //Nuevo objeto de controllerTotal
        $controller = new controllerTotal();

        //Llamamos a la funcion
        $controller->contentDetail($identificador);

        //break
        break;

        //Caso list
    case 'list':

        //Nuevo objeto de controllerList
        $controller = new controllerList();

        //Llamamos a la funcion
        $controller->contentList();

        //break
        break;

        //sino por defecto:
    default: 
        echo "undefined action";
} */

/*

PARA QUE EN LA PRACTICA NO HAYA QUE HACER INDEX.PHP?ACTION=DETAIL&ID=7

QUE LLEGUEMOS CON /DETAIL/7;

echo $_SERVER["REQUEST_URL"];

*/

