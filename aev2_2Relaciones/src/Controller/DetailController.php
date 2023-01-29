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
      "data" => $data
    ]);
  }
}
