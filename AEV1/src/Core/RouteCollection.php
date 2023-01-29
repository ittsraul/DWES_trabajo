<?php

namespace app\Core;

use app\Core\Interfaces\IRoutes;

class RouteCollection implements IRoutes
{
    private $routes;
    private static $instance;
    protected function __construct()
    {
        $this->importRoutes();
    }
    protected function __clone()
    {
    }
    /**
     * Get the value of routes
     */
    public function getRoutes(): array
    {
        return $this->routes;
    }
    private function importRoutes(): void
    {
        $this->routes = json_decode(file_get_contents(__DIR__ . "/../../config/" . $_ENV["ROUTESFILE"]), true);
    }
    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new static();
        }
        return self::$instance;
    }
}
