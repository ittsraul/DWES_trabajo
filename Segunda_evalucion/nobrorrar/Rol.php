<?php

namespace App\Entity;

use App\Repository\RolRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RolRepository::class)]
class Rol
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nombreRol = null;

    #[ORM\Column]
    private ?int $nivel = null;

    #[ORM\Column(length: 255)]
    private ?string $no = null;

    #[ORM\OneToMany(mappedBy: 'rol', targetEntity: Usuario::class)]
    private Collection $listaUsuarios;

    public function __construct()
    {
        $this->listaUsuarios = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombreRol(): ?string
    {
        return $this->nombreRol;
    }

    public function setNombreRol(string $nombreRol): self
    {
        $this->nombreRol = $nombreRol;

        return $this;
    }

    public function getNivel(): ?int
    {
        return $this->nivel;
    }

    public function setNivel(int $nivel): self
    {
        $this->nivel = $nivel;

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

    /**
     * @return Collection<int, Usuario>
     */
    public function getListaUsuarios(): Collection
    {
        return $this->listaUsuarios;
    }

    public function addListaUsuario(Usuario $listaUsuario): self
    {
        if (!$this->listaUsuarios->contains($listaUsuario)) {
            $this->listaUsuarios->add($listaUsuario);
            $listaUsuario->setRol($this);
        }

        return $this;
    }

    public function removeListaUsuario(Usuario $listaUsuario): self
    {
        if ($this->listaUsuarios->removeElement($listaUsuario)) {
            // set the owning side to null (unless already changed)
            if ($listaUsuario->getRol() === $this) {
                $listaUsuario->setRol(null);
            }
        }

        return $this;
    }
}
