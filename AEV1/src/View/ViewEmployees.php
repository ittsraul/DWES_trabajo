<?php

namespace app\View;

class ViewEmployees
{
    public function drawDetail(array $data): void
    {
        echo "<table border='1'>";
        echo "<tr><td>" . $data["id"] . "</td></tr>";
        echo "<tr><td>" . $data["titulo"] . "</td></tr>";
        echo "<tr><td>" . $data["descripcion"] . "</td></tr>";
        echo "<tr><td>" . $data["fecha_creacion"] . "</td></tr>";
        echo "<tr><td>" . $data["fecha_vencimiento"] . "</td></tr>";
        echo "</table>";
    }
}