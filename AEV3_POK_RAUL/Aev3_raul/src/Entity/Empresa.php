<?php

namespace App\Entity;

use App\Repository\EmpresaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EmpresaRepository::class)]
#[ORM\Table(name: 'EMP')]
class Empresa
{
    #[ORM\Id]
    #[ORM\Column(name: 'EMP_NO', type: Types::SMALLINT)]
    private ?int $empNo = null;

    #[ORM\Column(name: 'APELLIDOS', length: 10)]
    private ?string $apellidos = null;

    #[ORM\Column(name: 'OFICIO', length: 10, nullable: true)]
    private ?string $oficio = null;

    #[ORM\Column(name: 'JEFE', type: Types::SMALLINT, nullable: true)]
    private ?int $Jefe = null;

    #[ORM\Column(name: 'FECHA_ALTA', type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $FechaAlta = null;

    #[ORM\Column(name: 'SALARIO', nullable: true)]
    private ?int $salario = null;

    #[ORM\Column(name: 'COMISION', nullable: true)]
    private ?int $comision = null;

    #[ORM\Column(name: 'DEPT_NO')]
    private ?int $DeptNo = null;

    #[ORM\OneToMany(mappedBy: 'reprCod', targetEntity: Clientes::class)]
    private Collection $clientesLista;

    public function __construct()
    {
        $this->clientesLista = new ArrayCollection();
    }

    

    public function getEmpNo(): ?int
    {
        return $this->empNo;
    }

    public function setEmpNo(int $empNo): self
    {
        $this->empNo = $empNo;

        return $this;
    }

    public function getApellidos(): ?string
    {
        return $this->apellidos;
    }

    public function setApellidos(string $apellidos): self
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    public function getOficio(): ?string
    {
        return $this->oficio;
    }

    public function setOficio(?string $oficio): self
    {
        $this->oficio = $oficio;

        return $this;
    }

    public function getJefe(): ?int
    {
        return $this->Jefe;
    }

    public function setJefe(?int $Jefe): self
    {
        $this->Jefe = $Jefe;

        return $this;
    }

    public function getFechaAlta(): ?\DateTimeInterface
    {
        return $this->FechaAlta;
    }

    public function setFechaAlta(?\DateTimeInterface $FechaAlta): self
    {
        $this->FechaAlta = $FechaAlta;

        return $this;
    }

    public function getsalario(): ?int
    {
        return $this->salario;
    }

    public function setsalario(?int $salario): self
    {
        $this->salario = $salario;

        return $this;
    }

    public function getcomision(): ?int
    {
        return $this->comision;
    }

    public function setcomision(?int $comision): self
    {
        $this->comision = $comision;

        return $this;
    }

    public function getDeptNo(): ?int
    {
        return $this->DeptNo;
    }

    public function setDeptNo(int $DeptNo): self
    {
        $this->DeptNo = $DeptNo;

        return $this;
    }

    /**
     * @return Collection<int, Clientes>
     */
    public function getClientesLista(): Collection
    {
        return $this->clientesLista;
    }

    public function addClientesLista(Clientes $clientesLista): self
    {
        if (!$this->clientesLista->contains($clientesLista)) {
            $this->clientesLista->add($clientesLista);
            $clientesLista->setReprCod($this);
        }

        return $this;
    }

    public function removeClientesLista(Clientes $clientesLista): self
    {
        if ($this->clientesLista->removeElement($clientesLista)) {
            // set the owning side to null (unless already changed)
            if ($clientesLista->getReprCod() === $this) {
                $clientesLista->setReprCod(null);
            }
        }

        return $this;
    }
}
