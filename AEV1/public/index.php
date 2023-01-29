<?php
require_once "../vendor/autoload.php";

use Dotenv\Dotenv;
use app\Core\Request;
use app\Core\RouteCollection;
use app\Core\Dispatcher;


$dotenv = Dotenv::createImmutable('../');
$dotenv->load();

new Dispatcher(RouteCollection::getInstance(), Request::getInstance());
