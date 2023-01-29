<?php

namespace app\Repository;

use app\Entity\Clientes;
use app\Entity\Emp;
use Doctrine\ORM\EntityRepository;

class ClientesRepository extends EntityRepository{

    public function update(int $clienteCod, array $data): void
    {
        $client = $this->find($clienteCod);
        $Emprepository = $this->getEntityManager()->getRepository(Emp::class);
        $client->setClienteCod($data["clienteCod"]) 
            ->setNombre($data["nombre"])
            ->setDirec($data["direc"])
            ->setCiudad($data["ciudad"])
            ->setEstado($data["estado"])
            ->setCodPostal($data["codPostal"])
            ->setArea($data["area"])
            ->setTelefono($data["telefono"])
            ->setReprCod($Emprepository->find($data["reprCod"]))
            ->setLimiteCredito($data["limiteCredito"])
            ->setObservaciones($data["observaciones"]);
        $this->getEntityManager()->persist($client);
        $this->getEntityManager()->flush();
    }

    public function delete(int $clienteCod): void
    {
        $client = $this->find($clienteCod);
        $this->getEntityManager()->remove($client);
        $this->getEntityManager()->flush();
    }

    public function insert(array $data): void
    {
        $client = new Clientes;
        $Emprepository = $this->getEntityManager()->getRepository(Emp::class);
        $client->setClienteCod($data["clienteCod"]) 
            ->setNombre($data["nombre"])
            ->setDirec($data["direc"])
            ->setCiudad($data["ciudad"])
            ->setEstado($data["estado"])
            ->setCodPostal($data["codPostal"])
            ->setArea($data["area"])
            ->setTelefono($data["telefono"])
            ->setReprCod($Emprepository->find($data["reprCod"]))
            ->setLimiteCredito($data["limiteCredito"])
            ->setObservaciones($data["observaciones"]);

        $this->getEntityManager()->persist($client);
        $this->getEntityManager()->flush();
    }

}
