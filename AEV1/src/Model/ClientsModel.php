<?php

namespace app\Model;

use app\Core\Interfaces\IDataBase;

class ClientsModel
{
    private IDataBase $dataBase;
    public function __construct(IDataBase $dataBase)
    {
        $this->dataBase = $dataBase;
    }
    public function getClientsList(): array
    {
        return $this->dataBase->findAll("CLIENTE");
    }
    public function getClient(int $id): array
    {
        $clientInfo = $this->dataBase->find("CLIENTE", "CLIENTE_COD", $id);
        return $clientInfo;
    }
}
