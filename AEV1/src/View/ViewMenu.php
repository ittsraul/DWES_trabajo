<?php
namespace app\View;

class ViewMenu
{
    public function ViMenu(){
        echo "<table>";
        echo "<tr>";
        echo "<td><a href='./Controller/ControllerClients.php'>Clientes</a></td>";
        echo "<td><a href='./Controller/ControllerEmployees.php'>Empleados</a></td>";
        echo "</tr>";
        echo "</table>";
    }
}


?>