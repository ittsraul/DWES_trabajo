<?php

namespace App\Entity;

use App\Repository\DeptRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DeptRepository::class)]
class Dept
{
    #[ORM\Id]
    #[ORM\Column(name: "DEPT_NO")]
    private ?int $deptNo = null;

    #[ORM\Column(name: "DBNOMBRE",length: 14, nullable: true)]
    private ?string $dbNombre = null;

    #[ORM\Column(name: "LOC",length: 14, nullable: true)]
    private ?string $Loc = null;

    public function getId(): ?int
    {
        return $this->deptNo;
    }

    public function getDbNombre(): ?string
    {
        return $this->dbNombre;
    }

    public function setDbNombre(string $dbNombre): self
    {
        $this->dbNombre = $dbNombre;

        return $this;
    }

    public function getLoc(): ?string
    {
        return $this->Loc;
    }

    public function setLoc(?string $Loc): self
    {
        $this->Loc = $Loc;

        return $this;
    }

    public function getNo(): ?string
    {
        return $this->no;
    }

    public function setNo(string $no): self
    {
        $this->no = $no;

        return $this;
    }
}
