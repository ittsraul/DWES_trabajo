<?php

namespace app\Core\Interfaces;

interface IDataBase
{
    public function executeSQL(string $sql): array;
}
