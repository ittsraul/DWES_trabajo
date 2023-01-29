<?php

namespace app\Repository;

use app\Entity\Cliente;
use Doctrine\ORM\EntityRepository;

class ClienteRepository extends EntityRepository{

    public function update(int $id, array $data): void
    {
        $cliente = $this->find($id);
        $cliente
            ->setNombre($data['nombre'])
            ->setDirec($data['direc'])
            ->setCiudad($data['ciudad'])
            ->setEstado($data['estado'])
            ->setCodPostal($data['codPostal'])
            ->setArea($data['area'])
            ->setTelefono($data['telefono'])
            ->setReprCod($data['reprCod'])
            ->setLimiteCredito($data['limiteCredito'])
            ->setObservaciones($data['observaciones']);
        $this->getEntityManager()->persist($cliente);
        $this->getEntityManager()->flush();
    }

    public function delete(int $id): void
    {
        $cliente = $this->find($id);
        $this->getEntityManager()->remove($cliente);
        $this->getEntityManager()->flush();
    }

    public function insert(array $data): void
    {
        $cliente = new Cliente;
        $cliente
            ->setClienteCod($data['clienteCod'])
            ->setNombre($data['nombre'])
            ->setDirec($data['direc'])
            ->setCiudad($data['ciudad'])
            ->setEstado($data['estado'])
            ->setCodPostal($data['codPostal'])
            ->setArea($data['area'])
            ->setTelefono($data['telefono'])
            ->setReprCod($data['reprCod'])
            ->setLimiteCredito($data['limiteCredito'])
            ->setObservaciones($data['observaciones']);
        $this->getEntityManager()->persist($cliente);
        $this->getEntityManager()->flush();
    }

}
