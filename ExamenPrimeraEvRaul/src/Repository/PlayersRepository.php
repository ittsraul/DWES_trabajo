<?php

namespace app\Repository;

use app\Entity\players;
use Doctrine\ORM\EntityRepository;

class PlayersRepository extends EntityRepository{
public function insert(array $data): void
{
    $Player = new players;
    $Player
        ->setIdPlayer($data['IdPlayer'])
        ->setNamePlayer($data['NamePlayer'])
        ->setScore($data['Score']);
    $this->getEntityManager()->persist($Player);
    $this->getEntityManager()->flush();
}
}
?>
