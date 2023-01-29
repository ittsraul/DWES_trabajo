<?php
namespace app\core\interfaces;

interface IDatabase{
    public function executeSQL(?string $sql): array ;
}

?>