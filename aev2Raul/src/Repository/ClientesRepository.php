<?php

namespace app\Repository;

use app\Entity\Clientes;
use Doctrine\ORM\EntityRepository;

class ClientesRepository extends EntityRepository{

    public function update(int $clienteCod): void
    {
        $client = $this->find($clienteCod);
        $client->setClienteCod($_POST["clienteCod"]) 
            ->setNombre($_POST["nombre"])
            ->setDirec($_POST["direc"])
            ->setCiudad($_POST["ciudad"])
            ->setEstado($_POST["estado"])
            ->setCodPostal($_POST["codPostal"])
            ->setArea($_POST["area"])
            ->setTelefono($_POST["telefono"])
            ->setReprCod($_POST["reprCod"])
            ->setLimiteCredito($_POST["limiteCredito"])
            ->setObservaciones($_POST["observaciones"]);
        $this->getEntityManager()->persist($client);
        $this->getEntityManager()->flush();
    }

    public function delete(int $clienteCod): void
    {
        $client = $this->find($clienteCod);
        $this->getEntityManager()->remove($client);
        $this->getEntityManager()->flush();
    }

    public function insert(): void
    {
        $client = new Clientes;
        $client->setClienteCod($_POST["clienteCod"]) 
            ->setNombre($_POST["nombre"])
            ->setDirec($_POST["direc"])
            ->setCiudad($_POST["ciudad"])
            ->setEstado($_POST["estado"])
            ->setCodPostal($_POST["codPostal"])
            ->setArea($_POST["area"])
            ->setTelefono($_POST["telefono"])
            ->setReprCod($_POST["reprCod"])
            ->setLimiteCredito($_POST["limiteCredito"])
            ->setObservaciones($_POST["observaciones"]);

        $this->getEntityManager()->persist($client);
        $this->getEntityManager()->flush();
    }

}
