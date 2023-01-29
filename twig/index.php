<?php

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
require_once "vendor/autoload.php";

$loader = new FilesystemLoader("templates");
$twig = new Environment($loader);

class one{
    public $attr = 1;
    public function getAttr(){
        return $this->attr;
    }
}
echo $twig->render('template.html.twig', [
    "nombre" => "Raul",
    "modulo" => ["dwes","diseño"],
    "direccion" => [
        "calle" => 3,
        "numero" => 8
    ],
    "claseEjemplo" => new one()
]);
?>