<?php

namespace app\View;

class EmployeesDetailView
{
    public function drawEmployeesDetail(array $data): void
    {
        echo "<table border='1'>";
        echo "<tr><td>" . $data["EMP_NO"] . "</td>";
        echo "    <td>" . $data["APELLIDOS"] . "</td>";
        echo "    <td>" . $data["OFICIO"] . "</td></tr>";
        echo "<tr><td COLSPAN='3'>FECHA ALTA:" . $data["FECHA_ALTA"] . "</td></tr>";
        echo "<tr><td COLSPAN='3'>SALARIO: " . $data["SALARIO"] . " €</td></tr>";
        echo "<tr><td COLSPAN='3'>COMISIÓN:" . $data["COMISION"] . "</td></tr>";
        echo "</table>";
        echo "<a href='/employees'>Lista de empleados</a>";
    }
}
