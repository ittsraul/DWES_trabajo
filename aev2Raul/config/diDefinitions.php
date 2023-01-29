<?php

use app\Core\Request;
use app\Core\Doctrinebulma;
use app\Core\RouteCollection;
use app\Core\Interfaces\IRoutes;
use app\Core\Interfaces\IRequest;
use Doctrine\ORM\EntityManager;

return [
    IRoutes::class =>  DI\create(RouteCollection::class),
    IRequest::class => DI\create(Request::class),
    EntityManager::class => function () {
        $bulma = new Doctrinebulma;
        return $bulma->getEm();
    },
    
];
