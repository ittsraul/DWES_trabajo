<?php
namespace app\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use app\Repository\EmpRepository;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: EmpRepository::class)]
#[ORM\Table(name: 'EMP')]
class Emp{
    #[ORM\Id]
    #[ORM\Column(name: 'EMP_NO', type: Types::SMALLINT)]
    private $empNo;
    #[ORM\Column(name: "APELLIDOS",type: Types::STRING)]
    private $apellidos;
    #[ORM\Column(name: "OFICIO",type: Types::TEXT)]
    private $oficio; 
    #[ORM\ManyToOne(targetEntity: "Emp", inversedBy:"Esclavos")]
    #[ORM\JoinColumn(name: "JEFE",  referencedColumnName: "EMP_NO")]
    private $jefe;
    #[ORM\Column(name: 'FECHA_ALTA', type: Types::DATE_MUTABLE)]
    private $fechaAlta;
    #[ORM\Column(name: "SALARIO",type: Types::INTEGER)]
    private $salario;
    #[ORM\Column(name: "COMISION",type: Types::INTEGER)]
    private $comision;
    #[ORM\Column(name: "DEPT_NO",type: Types::SMALLINT)]
    private $dept_no;
    // Configuracion para almacenar clientes
    // mapped by apunta a quien contiene la clave foranea
    #[ORM\OneToMany(targetEntity: "Clientes", mappedBy: "reprCod")]
    private $clientes;
    #[ORM\OneToMany(targetEntity: "Emp", mappedBy: "JEFE")]
    private $Esclavos;

    public function __construct(){
        $this->clientes = new ArrayCollection();
        $this->esclavos = new ArrayCollection();
    }

    public function getEmpNo()
    {
        return $this->empNo;
    }

    public function setEmpNo($empNo)
    {
        $this->empNo = $empNo;

        return $this;
    }

    public function getApellidos()
    {
        return $this->apellidos;
    }

    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    public function getOficio()
    {
        return $this->oficio;
    }

    public function setOficio($oficio)
    {
        $this->oficio = $oficio;

        return $this;
    }

    public function getFechaAlta()
    {
        return $this->fechaAlta;
    }

    public function setFechaAlta($fechaAlta)
    {
        $this->fechaAlta = $fechaAlta;

        return $this;
    }

    public function getSalario()
    {
        return $this->salario;
    }

    public function setSalario($salario)
    {
        $this->salario = $salario;

        return $this;
    }

    public function getComision()
    {
        return $this->comision;
    }

    public function setComision($comision)
    {
        $this->comision = $comision;

        return $this;
    }

    public function getDept_no()
    {
        return $this->dept_no;
    }

    public function setDept_no($dept_no)
    {
        $this->dept_no = $dept_no;

        return $this;
    }

    public function getJefe()
    {
        return $this->jefe;
    }

    public function setJefe($jefe)
    {
        $this->jefe = $jefe;

        return $this;
    }

    public function getClientes(): ArrayCollection
    {
        return $this->clientes;
    }

    public function addClientes(Clientes $cliente):self
    {
        if ($this->clientes->contains($cliente)){
            $this->clientes[] = $cliente;
            $cliente->setReprCod($this);
        }
        
        return $this;
    }

    public function removeclientes(Clientes $cliente) :self
    {
        if ($this->clientes->contains($cliente)) {
            $this->clientes->removeElement($cliente);
            if ($cliente->getReprCod()=== $this) {
                $cliente->setReprCod(null);
            }
        }
        return $this;
    }
}