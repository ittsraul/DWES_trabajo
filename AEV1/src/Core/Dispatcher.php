<?php

namespace app\Core;

use app\Core\Interfaces\IRequest;
use app\Core\Interfaces\IRoutes;

class Dispatcher
{
    private $routeList;
    private IRequest $currentRequest;
    public function __construct(IRoutes $routeCollection, IRequest $request)
    {
        $this->routeList = $routeCollection->getRoutes();
        $this->currentRequest = $request;
        $this->dispatch();
    }
    private function dispatch()
    {
        $route = $this->currentRequest->getRoute();
        if (isset($this->routeList[$route])) {
            $controllerClass = "app\\Controller\\" . $this->routeList[$route]["controller"]; 
            $controller =  new $controllerClass; 
            $method = $this->routeList[$route]["method"];
            $controller->$method(...$this->currentRequest->getParams());
        } else {
            echo "ruta no existe";
        }
    }
}
