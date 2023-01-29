<?php

namespace app\Model;

use app\Core\Interfaces\IDataBase;

class EmployeesModel
{
    private IDataBase $dataBase;
    public function __construct(IDataBase $dataBase)
    {
        $this->dataBase = $dataBase;
    }
    public function getEmployeesList(): array
    {
        return $this->dataBase->findAll("EMP");
    }
    public function getEmployee(int $id): array
    {
        return $this->dataBase->find("EMP", "EMP_NO", $id);
    }
}
