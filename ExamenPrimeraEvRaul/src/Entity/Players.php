<?php
namespace app\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use app\Repository\PlayersRepository;

#[ORM\Entity(repositoryClass: PlayersRepository::class)]
#[ORM\Table(name: 'PLAYERS')]
class players{
    #[ORM\Id]
    #[ORM\Column(name:"ID_PLAYER", type: Types::SMALLINT)]
    private $IdPlayer;
    #[ORM\Column(name:"NAME_PLAYER", type: Types::STRING, length: 25)]
    private $NamePlayer;
    #[ORM\Column(name:"SCORE", type: Types::SMALLINT)]
    private $Score;

    public function getIdPlayer()
    {
        return $this->IdPlayer;
    }

    public function setIdPlayer($IdPlayer)
    {
        $this->IdPlayer = $IdPlayer;

        return $this;
    }

    public function getNamePlayer()
    {
        return $this->NamePlayer;
    }

    public function setNamePlayer($NamePlayer)
    {
        $this->NamePlayer = $NamePlayer;

        return $this;
    }

    public function getScore()
    {
        return $this->Score;
    }

    public function setScore($Score)
    {
        $this->Score = $Score;

        return $this;
    }
}