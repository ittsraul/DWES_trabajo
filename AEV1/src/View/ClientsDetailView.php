<?php

namespace app\View;

class ClientsDetailView
{
    public function drawClientsDetail(array $data): void
    {
        echo "<table border='1'>";
        echo "<tr><td>" . $data["CLIENTE_COD"] . "</td>";
        echo "    <td>" . $data["NOMBRE"] . "</td></tr>";
        echo "<tr><td>" . $data["DIREC"] . " " . $data["CIUDAD"] . " (" . $data["COD_POSTAL"] . "), " . $data["ESTADO"] . " #" . $data["AREA"] . "#</td>";
        echo "    <td>TEL: " . $data["TELEFONO"] . "</td></tr>";
        echo "<tr><td colspan='2'>" . $data["LIMITE_CREDITO"] . " €</td></tr>";
        echo "<tr><td colspan='2'>" . $data["OBSERVACIONES"] . "</td></tr>";
        echo "</table>";
        echo "<a href='/clients'>Lista de clientes</a>";
    }
}
