<?php

namespace app\Core;

use app\Core\Interfaces\IRequest;

class Request implements IRequest
{
    private $route;
    private $params;
    private static $instance;
    protected function __construct()
    {
        $rawRoute = $_SERVER["REQUEST_URI"];
        $rawRouteElements = explode("/", $rawRoute);
        $this->route = "/" . $rawRouteElements[1];
        $this->params = array_slice($rawRouteElements, 2);
    }
    protected function __clone()
    {
    }
    /**
     * Get the value of route
     */
    public function getRoute(): string
    {
        return $this->route;
    }

    public function __call($name, $arguments)
    {
        $name = str_replace("get", "", $name);
        return $_POST[$name];
    }

    /**
     * Get the value of params
     */
    public function getParams(): array
    {
        return $this->params;
    }
    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new static();
        }
        return self::$instance;
    }
}
