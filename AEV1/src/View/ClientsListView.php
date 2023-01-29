<?php

namespace app\View;

class ClientsListView
{
    public function drawClientsList(array $data): void
    {
        echo "<table border='1'>";
        foreach ($data as $fila) {
            echo "<tr>";
            echo "<td><a href='/clientdetail/" . $fila["CLIENTE_COD"] . "'>" . $fila["NOMBRE"] . "</a></td>";
            echo "<td>" . $fila["CIUDAD"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "<a href='/'>Menu principal</a>";
    }
}
