<?php
namespace app\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use app\Repository\EmpRepository;

#[ORM\Entity(repositoryClass: EmpRepository::class)]
#[ORM\Table(name: 'EMP')]
class Emp{

    #[ORM\Id]
    #[ORM\Column(name: 'EMP_NO', type: Types::SMALLINT)]
    private $empNo;
    #[ORM\Column(name: 'APELLIDOS', type: Types::STRING, length: 45)]
    private $apellidos;
    #[ORM\Column(name: 'OFICIO', type: Types::STRING, length: 45)]
    private $oficio;
    #[ORM\Column(name: 'JEFE', type: Types::SMALLINT)]
    private $jefe;
    #[ORM\Column(name: 'FECHA_ALTA', type: Types::DATE_MUTABLE)]
    private $fechaAlta;
    #[ORM\Column(name: 'SALARIO', type: Types::INTEGER)]
    private $salario;
    #[ORM\Column(name: 'COMISION', type: Types::INTEGER)]
    private $comision;
    #[ORM\Column(name: 'DEPT_NO', type: Types::SMALLINT)]
    private $deptNo;
    

    /**
     * Get the value of empNo
     */
    public function getEmpNo()
    {
        return $this->empNo;
    }

    /**
     * Set the value of empNo
     */
    public function setEmpNo($empNo): self
    {
        $this->empNo = $empNo;

        return $this;
    }

    /**
     * Get the value of apellidos
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Set the value of apellidos
     */
    public function setApellidos($apellidos): self
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    /**
     * Get the value of oficio
     */
    public function getOficio()
    {
        return $this->oficio;
    }

    /**
     * Set the value of oficio
     */
    public function setOficio($oficio): self
    {
        $this->oficio = $oficio;

        return $this;
    }

    /**
     * Get the value of jefe
     */
    public function getJefe()
    {
        return $this->jefe;
    }

    /**
     * Set the value of jefe
     */
    public function setJefe($jefe): self
    {
        $this->jefe = $jefe;

        return $this;
    }

    /**
     * Get the value of fechaAlta
     */
    public function getFechaAlta()
    {
        return $this->fechaAlta;
    }

    /**
     * Set the value of fechaAlta
     */
    public function setFechaAlta($fechaAlta): self
    {
        $this->fechaAlta = $fechaAlta;

        return $this;
    }

    /**
     * Get the value of salario
     */
    public function getSalario()
    {
        return $this->salario;
    }

    /**
     * Set the value of salario
     */
    public function setSalario($salario): self
    {
        $this->salario = $salario;

        return $this;
    }

    /**
     * Get the value of comision
     */
    public function getComision()
    {
        return $this->comision;
    }

    /**
     * Set the value of comision
     */
    public function setComision($comision): self
    {
        $this->comision = $comision;

        return $this;
    }

    /**
     * Get the value of deptNo
     */
    public function getDeptNo()
    {
        return $this->deptNo;
    }

    /**
     * Set the value of deptNo
     */
    public function setDeptNo($deptNo): self
    {
        $this->deptNo = $deptNo;

        return $this;
    }
}