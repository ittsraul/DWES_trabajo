<?php
namespace app\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use app\Repository\ClientesRepository;
use Doctrine\ORM\Mapping\ManyToOne;

#[ORM\Entity(repositoryClass: ClientesRepository::class)]
#[ORM\Table(name: 'CLIENTE')]
class Clientes{
    #[ORM\Id]
    #[ORM\Column(name:"CLIENTE_COD", type: Types::INTEGER)]
    private $clienteCod;
    #[ORM\Column(name:"NOMBRE", type: Types::STRING)]
    private $nombre;
    #[ORM\Column(name:"DIREC", type: Types::STRING)]
    private $direc;
    #[ORM\Column(name:"CIUDAD", type: Types::STRING)]
    private $ciudad;
    #[ORM\Column(name:"ESTADO", type: Types::STRING)]
    private $estado;
    #[ORM\Column(name: "COD_POSTAL", type: Types::STRING)]
    private $codPostal;
    #[ORM\Column(name: "AREA", type: Types::SMALLINT)]
    private $area;
    #[ORM\Column(name:"TELEFONO",  type: Types::STRING)]
    private $telefono;
    #[ManyToOne(targetEntity: "Emp", inversedBy: "clientes")]
    #[ORM\JoinColumn(name: "REPR_COD",  referencedColumnName: "EMP_NO")]
    private $reprCod;
    #[ORM\Column(name: "LIMITE_CREDITO",  type: Types::DECIMAL, precision: 2)]
    private $limiteCredito;
    #[ORM\Column(name: "OBSERVACIONES",  type: Types::TEXT)]
    private $observaciones;

    public function getClienteCod()
    {
        return $this->clienteCod;
    }

    public function setClienteCod($clienteCod)
    {
        $this->clienteCod = $clienteCod;

        return $this;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getDirec()
    {
        return $this->direc;
    }

    public function setDirec($direc)
    {
        $this->direc = $direc;

        return $this;
    }

    public function getCiudad()
    {
        return $this->ciudad;
    }

    public function setCiudad($ciudad)
    {
        $this->ciudad = $ciudad;

        return $this;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    public function getCodPostal()
    {
        return $this->codPostal;
    }
 
    public function setCodPostal($codPostal)
    {
        $this->codPostal = $codPostal;

        return $this;
    }

    public function getArea()
    {
        return $this->area;
    }

    public function setArea($area)
    {
        $this->area = $area;

        return $this;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    public function getReprCod() :?Emp
    {
        return $this->reprCod;
    }

    public function setReprCod(?Emp $reprCod) : self
    {
        $this->reprCod = $reprCod;

        return $this;
    }

    public function getLimiteCredito()
    {
        return $this->limiteCredito;
    }

    public function setLimiteCredito($limiteCredito)
    {
        $this->limiteCredito = $limiteCredito;

        return $this;
    }

    public function getObservaciones()
    {
        return $this->observaciones;
    }

    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;

        return $this;
    }
}