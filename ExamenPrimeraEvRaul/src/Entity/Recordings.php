<?php
namespace app\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use app\Repository\RecordingsRepository;

#[ORM\Entity(repositoryClass: RecordingsRepository::class)]
#[ORM\Table(name: 'PLAYERS')]
class Recordings{
    #[ORM\Id]
    #[ORM\Column(name:"ID_RECORDINGS", type: Types::SMALLINT)]
    private $IdRecordings;
    #[ORM\Column(name:"DATE_RECORD", type: Types::DATE_MUTABLE)]
    private $DateRecord;
    #[ORM\Column(name:"PLAYER", type: Types::SMALLINT)]
    private $Player;
    #[ORM\Column(name:"WINNER", type: Types::SMALLINT, length: 1)]
    private $Winner;


    public function getDateRecord()
    {
        return $this->DateRecord;
    }

    public function setDateRecord($DateRecord) : self
    {
        $this->DateRecord = $DateRecord;

        return $this;
    }

    public function getPlayer()
    {
        return $this->Player;
    }

    public function setPlayer($Player)
    {
        $this->Player = $Player;

        return $this;
    }

    public function getWinner()
    {
        return $this->Winner;
    }

    public function setWinner($Winner)
    {
        $this->Winner = $Winner;

        return $this;
    }

    public function getIdRecordings()
    {
        return $this->IdRecordings;
    }

    public function setIdRecordings($IdRecordings)
    {
        $this->IdRecordings = $IdRecordings;

        return $this;
    }
}