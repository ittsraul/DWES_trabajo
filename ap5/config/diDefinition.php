<?php

use app\Core\Request;
use app\Core\DataBase;
use app\Core\Interfaces\IDataBase;
use app\Core\Interfaces\IRequest;
use app\Core\Interfaces\IRoutes;
use app\Core\RouteCollection; 

return[
    IDataBase::class => function(){
        return DataBase::getInstance();
    },
    IRoutes::class => DI\create(RouteCollection::class),
    IRequest::class => DI\create(request::class)
];


?>