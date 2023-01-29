<?php

//Uso de namespace
namespace app\controller;

//Use para que use/pida lo que necite el controler
use app\model\modelTotal;
use app\view\viewTotal;

//Clase controllerTotal
class controllerTotal{

    //Funcion que contentDetail
    public function contentDetail($identificador)
    {
        //nuevo objeto de modelTotal
        $modelT = new modelTotal();

        //
        $data = $modelT->getTDetail($identificador);
        
        //nuevo objeto de viewTotal
        $viewT = new viewTotal();
        
        //
        $viewT-> drawDetailTotal($data); 
    }
}

?>