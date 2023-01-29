<?php

namespace app\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use app\Repository\TareasRepository;

#[ORM\Entity(repositoryClass: TareasRepository::class)]
#[ORM\Table(name: 'tareas')]
class Tareas
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: types::INTEGER)]
    private $id;
    #[ORM\Column(length: 255, type: types::STRING)]
    private $titulo;
    #[ORM\Column(type: types::TEXT)]
    private $descripcion;
    #[ORM\Column(name: 'fecha_creacion', type: types::DATE_MUTABLE)]
    private $fechaCreacion;
    #[ORM\Column(name: 'fecha_vencimiento', type: types::DATE_MUTABLE)]
    private $fechaVencimiento;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getFechaCreacion()
    {
        return $this->fechaCreacion;
    }

    public function setFechaCreacion($fechaCreacion)
    {
        $this->fechaCreacion = $fechaCreacion;

        return $this;
    }

    public function getFechaVencimiento()
    {
        return $this->fechaVencimiento;
    }

    public function setFechaVencimiento($fechaVencimiento)
    {
        $this->fechaVencimiento = $fechaVencimiento;

        return $this;
    }
}
