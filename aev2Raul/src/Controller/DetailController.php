<?php

namespace app\Controller;

use app\Entity\Clientes;
use Doctrine\ORM\EntityManager;
use app\Core\AbstractController;

class DetailController extends AbstractController
{
  private $repository;
  public function __construct(EntityManager $em)
  {
    $this->repository = $em->getRepository(Clientes::class);
    parent::__construct();
  }
  public function main(int $clienteCod)
  {
    $data = $this->repository->find($clienteCod);
    $this->render("detail.html.twig", [
      "CLIENTE_COD" => $data->getClienteCod(),
      "NOMBRE" => $data->getNombre(),
      "DIREC" => $data->getDirec(),
      "CIUDAD" => $data->getCiudad(),
      "ESTADO" => $data->getEstado(),
      "COD_POSTAL" => $data->getCodPostal(),
      "AREA" => $data->getArea(),
      "TELEFONO" => $data->getTelefono(),
      "REPR_COD" => $data->getReprCod(),
      "LIMITE_CREDITO" => $data->getLimiteCredito(),
      "OBSERVACIONES" => $data->getObservaciones()
    ]);
  }
}
