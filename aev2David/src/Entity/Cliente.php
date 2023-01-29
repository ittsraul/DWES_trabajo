<?php
namespace app\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use app\Repository\ClienteRepository;

#[ORM\Entity(repositoryClass: ClienteRepository::class)]
#[ORM\Table(name: 'CLIENTE')]
class Cliente{

    #[ORM\Id]
    #[ORM\Column(name: 'CLIENTE_COD', type: Types::SMALLINT)]
    private $clienteCod;
    #[ORM\Column(name: 'NOMBRE', type: Types::STRING, length: 45)]
    private $nombre;
    #[ORM\Column(name: 'DIREC', type: Types::STRING, length: 40)]
    private $direc;
    #[ORM\Column(name: 'CIUDAD', type: Types::STRING, length: 30)]
    private $ciudad;
    #[ORM\Column(name: 'ESTADO', type: Types::STRING, length: 2)]
    private $estado;
    #[ORM\Column(name: 'COD_POSTAL', type: Types::STRING, length: 9)]
    private $codPostal;
    #[ORM\Column(name: 'AREA', type: Types::SMALLINT)]
    private $area;
    #[ORM\Column(name: 'TELEFONO', type: Types::STRING, length: 9)]
    private $telefono;
    #[ORM\Column(name: 'REPR_COD', type: Types::SMALLINT)]
    private $reprCod;
    #[ORM\Column(name: 'LIMITE_CREDITO', type: Types::DECIMAL, precision: 9, scale: 2)]
    private $limiteCredito;
    #[ORM\Column(name: 'OBSERVACIONES', type: Types::TEXT)]
    private $observaciones;


    /**
     * Get the value of clienteCod
     */
    public function getClienteCod()
    {
        return $this->clienteCod;
    }

    /**
     * Set the value of clienteCod
     */
    public function setClienteCod($clienteCod): self
    {
        $this->clienteCod = $clienteCod;

        return $this;
    }

    /**
     * Get the value of nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     */
    public function setNombre($nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of direc
     */
    public function getDirec()
    {
        return $this->direc;
    }

    /**
     * Set the value of direc
     */
    public function setDirec($direc): self
    {
        $this->direc = $direc;

        return $this;
    }

    /**
     * Get the value of ciudad
     */
    public function getCiudad()
    {
        return $this->ciudad;
    }

    /**
     * Set the value of ciudad
     */
    public function setCiudad($ciudad): self
    {
        $this->ciudad = $ciudad;

        return $this;
    }

    /**
     * Get the value of estado
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set the value of estado
     */
    public function setEstado($estado): self
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get the value of codPostal
     */
    public function getCodPostal()
    {
        return $this->codPostal;
    }

    /**
     * Set the value of codPostal
     */
    public function setCodPostal($codPostal): self
    {
        $this->codPostal = $codPostal;

        return $this;
    }

    /**
     * Get the value of area
     */
    public function getArea()
    {
        return $this->area;
    }

    /**
     * Set the value of area
     */
    public function setArea($area): self
    {
        $this->area = $area;

        return $this;
    }

    /**
     * Get the value of telefono
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set the value of telefono
     */
    public function setTelefono($telefono): self
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get the value of reprCod
     */
    public function getReprCod()
    {
        return $this->reprCod;
    }

    /**
     * Set the value of reprCod
     */
    public function setReprCod($reprCod): self
    {
        $this->reprCod = $reprCod;

        return $this;
    }

    /**
     * Get the value of limiteCredito
     */
    public function getLimiteCredito()
    {
        return $this->limiteCredito;
    }

    /**
     * Set the value of limiteCredito
     */
    public function setLimiteCredito($limiteCredito): self
    {
        $this->limiteCredito = $limiteCredito;

        return $this;
    }

    /**
     * Get the value of observaciones
     */
    public function getObservaciones()
    {
        return $this->observaciones;
    }

    /**
     * Set the value of observaciones
     */
    public function setObservaciones($observaciones): self
    {
        $this->observaciones = $observaciones;

        return $this;
    }
}