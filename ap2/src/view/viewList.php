<?php
namespace app\view;

/* use app\core\Connection; */

class viewList
{
    public function drawList($viewL)
    {
        echo "<table border='1'>";
        foreach ($viewL as $fila) {
            echo "<tr>";
            echo "<td><a href='?action=detail&id=" . $fila["id"] . "'>" . $fila["titulo"] . "</a></td>";
            echo "<td>" . $fila["fecha_vencimiento"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
}

?>