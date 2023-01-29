<?php

namespace app\Controller;

use app\Entity\Emp;
use app\Entity\Cliente;
use Doctrine\ORM\EntityManager;
use app\Core\AbstractController;

class DetailController extends AbstractController
{
  private $em;
  public function __construct(EntityManager $em)
  {
    $this->em = $em;
    parent::__construct();
  }
  public function main(int $id)
  {
    $clienteRepository = $this->em->getRepository(Cliente::class);
    $data = $clienteRepository->find($id);
    $empRepository = $this->em->getRepository(Emp::class);
    $contact = $empRepository->find($data->getReprCod());
    $this->render("clientDetail.html.twig", [
      'data' => $data,
      'contact' => $contact
    ]);
  }
}
