<?php

namespace App\Entity;

use App\Repository\EmpresaRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EmpresaRepository::class)]
class Empresa
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]

    #[ORM\Column]
    private ?int $ClienteCod = null;

    #[ORM\Column(length: 45)]
    private ?string $Nombre = null;

    #[ORM\Column(length: 40)]
    private ?string $Direc = null;

    #[ORM\Column(length: 30)]
    private ?string $Ciudad = null;

    #[ORM\Column(length: 2, nullable: true)]
    private ?string $Estado = null;

    #[ORM\Column(length: 9)]
    private ?string $CodPostal = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $Area = null;

    #[ORM\Column(length: 9, nullable: true)]
    private ?string $Telefono = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $ReprCod = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 9, scale: 2)]
    private ?string $LimiteCredito = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $Observaciones = null;


    public function getCLIENTECOD(): ?int
    {
        return $this->ClienteCod;
    }

    public function setCLIENTECOD(int $ClienteCod): self
    {
        $this->ClienteCod = $ClienteCod;

        return $this;
    }

    public function getNombre(): ?string
    {
        return $this->Nombre;
    }

    public function setNombre(string $Nombre): self
    {
        $this->Nombre = $Nombre;

        return $this;
    }

    public function getDirec(): ?string
    {
        return $this->Direc;
    }

    public function setDirec(string $Direc): self
    {
        $this->Direc = $Direc;

        return $this;
    }

    public function getCiudad(): ?string
    {
        return $this->Ciudad;
    }

    public function setCiudad(string $Ciudad): self
    {
        $this->Ciudad = $Ciudad;

        return $this;
    }

    public function getEstado(): ?string
    {
        return $this->Estado;
    }

    public function setEstado(?string $Estado): self
    {
        $this->Estado = $Estado;

        return $this;
    }

    public function getCODPOSTAL(): ?string
    {
        return $this->CodPostal;
    }

    public function setCODPOSTAL(string $CodPostal): self
    {
        $this->CodPostal = $CodPostal;

        return $this;
    }

    public function getArea(): ?int
    {
        return $this->Area;
    }

    public function setArea(?int $Area): self
    {
        $this->Area = $Area;

        return $this;
    }

    public function getTelefono(): ?string
    {
        return $this->Telefono;
    }

    public function setTelefono(?string $Telefono): self
    {
        $this->Telefono = $Telefono;

        return $this;
    }

    public function getREPRCOD(): ?int
    {
        return $this->ReprCod;
    }

    public function setREPRCOD(?int $ReprCod): self
    {
        $this->ReprCod = $ReprCod;

        return $this;
    }

    public function getLIMITECREDITO(): ?string
    {
        return $this->LimiteCredito;
    }

    public function setLIMITECREDITO(string $LimiteCredito): self
    {
        $this->LimiteCredito = $LimiteCredito;

        return $this;
    }

    public function getObservaciones(): ?string
    {
        return $this->Observaciones;
    }

    public function setObservaciones(?string $Observaciones): self
    {
        $this->Observaciones = $Observaciones;

        return $this;
    }
}
