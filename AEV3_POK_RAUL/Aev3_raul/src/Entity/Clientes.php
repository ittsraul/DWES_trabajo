<?php

namespace App\Entity;

use App\Repository\ClientesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClientesRepository::class)]
#[ORM\Table(name: 'CLIENTE')]
class Clientes
{
    #[ORM\Id]
    #[ORM\Column(name: 'CLIENTE_COD')]
    private ?int $clienteCod  = null;

    #[ORM\Column(name: 'NOMBRE',length: 45)]
    private ?string $nombre = null;

    #[ORM\Column(name: 'DIREC',length: 40)]
    private ?string $direc = null;

    #[ORM\Column(name: 'CIUDAD',length: 30)]
    private ?string $ciudad = null;

    #[ORM\Column(name: 'ESTADO',length: 2, nullable: true)]
    private ?string $estado = null;

    #[ORM\Column(name: 'COD_POSTAL',length: 9)]
    private ?string $codPostal = null;

    #[ORM\Column(name: 'AREA',type: Types::SMALLINT, nullable: true)]
    private ?int $area = null;

    #[ORM\Column(name: 'TELEFONO',length: 9, nullable: true)]
    private ?string $telefono = null;
    #[ORM\ManyToOne(targetEntity: "Empresa", inversedBy: "Clientes")]

    #[ORM\Column(name: 'LIMITE_CREDITO',type: Types::DECIMAL, precision: 9, scale: 2, nullable: true)]
    private ?string $limiteCredito = null;

    #[ORM\Column(name: 'OBSERVACIONES',type: Types::TEXT, nullable: true)]
    private ?string $Observaciones = null;

    #[ORM\ManyToOne(inversedBy: 'clientesLista')]
    #[ORM\JoinColumn(name: 'REPR_COD', referencedColumnName: "EMP_NO", nullable: true)]
    private ?Empresa $reprCod = null;


    public function getClienteCod(): ?int
    {
        return $this->clienteCod;
    }

    public function setClienteCod(int $clienteCod): self
    {
        $this->clienteCod = $clienteCod;

        return $this;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getDirec(): ?string
    {
        return $this->direc;
    }

    public function setDirec(string $direc): self
    {
        $this->direc = $direc;

        return $this;
    }

    public function getCiudad(): ?string
    {
        return $this->ciudad;
    }

    public function setCiudad(string $ciudad): self
    {
        $this->ciudad = $ciudad;

        return $this;
    }

    public function getEstado(): ?string
    {
        return $this->estado;
    }

    public function setEstado(?string $estado): self
    {
        $this->estado = $estado;

        return $this;
    }

    public function getCodPostal(): ?string
    {
        return $this->codPostal;
    }

    public function setCodPostal(string $codPostal): self
    {
        $this->codPostal = $codPostal;

        return $this;
    }

    public function getArea(): ?int
    {
        return $this->area;
    }

    public function setArea(?int $area): self
    {
        $this->area = $area;

        return $this;
    }

    public function getTelefono(): ?string
    {
        return $this->telefono;
    }

    public function setTelefono(?string $telefono): self
    {
        $this->telefono = $telefono;

        return $this;
    }

    public function getReprCod(): ?Empresa
    {
        return $this->reprCod;
    }

    public function setReprCod(Empresa $reprCod): self
    {
        $this->reprCod = $reprCod;

        return $this;
    }

    public function getlimiteCredito(): ?string
    {
        return $this->limiteCredito;
    }

    public function setlimiteCredito(?string $limiteCredito): self
    {
        $this->limiteCredito = $limiteCredito;

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
