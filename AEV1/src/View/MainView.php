<?php

namespace app\View;

class MainView
{
    public function main(): void
    {
        echo "<table>";
        echo "  <tr>";
        echo "    <td><a href='/clients'>Clientes</a></td>";
        echo "  </tr>";
        echo "  <tr>";
        echo "    <td><a href='/employees'>Empleados</a></td>";
        echo "  </tr>";
        echo "</table>";
    }
}
