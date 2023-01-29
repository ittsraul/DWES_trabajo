<?php

namespace app\Model;

use app\Core\Interfaces\IDataBase;

class ManageEmployees
{
    private IDataBase $dataBase;
    public function __construct(IDataBase $dataBase)
    {
        $this->dataBase = $dataBase;
    }
    public function getDetail(int $id): array
    {
        $result = $this->dataBase->executeSQL("SELECT * FROM tareas WHERE id=$id");
        return array_shift($result);
    }
}
