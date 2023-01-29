<?php

namespace app\View;

class EmployeesListView
{
    public function drawEmployeesList(array $data): void
    {
        echo "<table border='1'>";
        foreach ($data as $fila) {
            echo "<tr>";
            echo "<td><a href='/employeesdetail/" . $fila["EMP_NO"] . "'>" . $fila["APELLIDOS"] . "</a></td>";
            echo "<td>" . $fila["OFICIO"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "<a href='/'>Menu principal</a>";
    }
}
