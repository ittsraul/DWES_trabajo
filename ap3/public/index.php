<?php
declare (strict_types=1);

//Require del autoloader, el cual esta configurado para buscar en el sitio o a partir del sitio que se le ha indicado
require_once "../vendor/autoload.php";

use Dotenv\Dotenv;
use app\core\dispatcher;

//Uso de libreria + fichero .env
$dotenv = Dotenv::createImmutable('../');
$dotenv->load();

new dispatcher();