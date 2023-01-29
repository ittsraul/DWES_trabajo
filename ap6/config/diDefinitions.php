<?php

use app\Core\Request;
use app\Core\DataBase;
use app\Core\RouteCollection;
use app\Core\Interfaces\IRoutes;
use app\Core\Interfaces\IRequest;
use app\Core\Interfaces\IDataBase;

return [
    IDataBase::class => function () {
        return DataBase::getInstance();
    },
    IRoutes::class =>  DI\create(RouteCollection::class),
    IRequest::class => DI\create(Request::class)
];
