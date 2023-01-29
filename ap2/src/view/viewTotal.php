<?php
namespace app\view;

use app\core\Connection;

class viewTotal extends Connection{
    //Para Sacar el detalle, esto dudo de si en modelo o vista
    public function drawDetailTotal($viewT){
        echo "<table border='1'>";
        echo "<tr><td>" . $viewT["id"] . "</td></tr>";
        echo "<tr><td>" . $viewT["titulo"] . "</td></tr>";
        echo "<tr><td>" . $viewT["descripcion"] . "</td></tr>";
        echo "<tr><td>" . $viewT["fecha_creacion"] . "</td></tr>";
        echo "<tr><td>" . $viewT["fecha_vencimiento"] . "</td></tr>";
        echo "</table>";
        }
    }

?>