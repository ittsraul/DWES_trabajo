<?php

use app\Core\Request;
use app\Core\RouteCollection;
use app\Core\DoctrineBootStrap;
use Doctrine\ORM\EntityManager;
use app\Core\Interfaces\IRoutes;
use app\Core\Interfaces\IRequest;

return [
    IRoutes::class =>  DI\create(RouteCollection::class),
    IRequest::class => DI\create(Request::class),
    EntityManager::class => function(){
        $bootStrap = new DoctrineBootStrap;
        return $bootStrap();
    }
];
