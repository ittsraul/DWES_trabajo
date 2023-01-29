<?php

namespace app\Core\Interfaces;

interface IDataBase
{
    public function find(string $table, string $keyField, int $id): array;
    public function findAll(string $table): array;
}
