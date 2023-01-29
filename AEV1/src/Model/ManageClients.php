<?php
namespace app\Model;

use app\Core\Interfaces\IDataBase;

class ManageClients
{
    private IDataBase $dataBase;
    public function __construct(IDataBase $dataBase)
    {
        $this->dataBase = $dataBase;
    }
    public function getList(): array
    {
        return $this->dataBase->executeSQL("SELECT id, titulo, fecha_vencimiento FROM cliente");        
    }
}