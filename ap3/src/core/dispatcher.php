<?php

namespace app\core;

use app\controller\{controllerList, controllerTotal};

class dispatcher
{
    private $routeList;
    private $route;
    private $params;
    public function __construct()
    {
        $url = explode("/", $_SERVER["REQUEST_URI"]);
        /* array_shift($url);
        $accion = array_shift($url); */
        $this->route = "/" . $url[1];
        $this->params = array_slice($url, 2);
        $this->routeList = json_decode(
            file_get_contents(
                __DIR__ . '/../../config/' . $_ENV['ROUTESFILES']
            ),true
        );
        var_dump($this->routeList);
        $this->dispatch();
    }
    function dispatch()
    {
        if (isset($this->routeList[$this->route])) {
            $ControllerClass = "app\\Controller\\" . $this->routeList[$this->route]["controller"];
            $Controller = new $ControllerClass;
            $action = $this->routeList[$this->route]["method"];
            $Controller->$action(...$this->params);
        } else {
            echo "no se encuentra";
        }
    }
}
