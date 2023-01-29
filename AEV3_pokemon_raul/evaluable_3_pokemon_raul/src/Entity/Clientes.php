<?php

namespace App\Entity;

use App\Repository\ClientesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClientesRepository::class)]
class Clientes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $clientes = null;

    #[ORM\Column(length: 14)]
    private ?string $Dnombre = null;

    #[ORM\Column(length: 14, nullable: true)]
    private ?string $Loc = null;

    #[ORM\Column(length: 20)]
    private ?string $Color = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClientes(): ?int
    {
        return $this->clientes;
    }

    public function setClientes(int $clientes): self
    {
        $this->clientes = $clientes;

        return $this;
    }

    public function getDnombre(): ?string
    {
        return $this->Dnombre;
    }

    public function setDnombre(string $Dnombre): self
    {
        $this->Dnombre = $Dnombre;

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

    public function getColor(): ?string
    {
        return $this->Color;
    }

    public function setColor(string $Color): self
    {
        $this->Color = $Color;

        return $this;
    }
}
