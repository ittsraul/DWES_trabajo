<?php

//Uso de namespace
namespace app\controller;

//Utilizamos los use necesarios
use app\model\modelList;
use app\view\viewList;

//Clase controlador
class controllerList
{

    //FUNCION contentList
    public function contentList()
    {
        //Nuevo objeto modelList
        $modelL = new modelList();

        //data será igual a el objeto modelo, el cual llama a getMList
        $data = $modelL->getMList();

        //Nuevo objeto viewList
        $viewL = new viewList(); 

        //El objeto viewL llama a drawList el cual le pasa un string y el contenido de data
        $viewL-> drawList($data); 
    }
}


?>