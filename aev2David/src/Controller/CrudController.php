<?php

namespace app\Controller;

use app\Entity\Emp;
use app\Entity\Cliente;
use Doctrine\ORM\EntityManager;
use app\Core\AbstractController;

class CrudController extends AbstractController
{
  private $em;
  public function __construct(EntityManager $em)
  {
    $this->em = $em;
    parent::__construct();
  }
  public function update(int $id)
  {
    $clienteRepository = $this->em->getRepository(Cliente::class);
    if (count($_POST)) $clienteRepository->update($id, $_POST);
    $data = $clienteRepository->find($id);
    $empRepository = $this->em->getRepository(Emp::class);
    $contact = $empRepository->findAll();
    $this->render("clientUpdate.html.twig", [
      'data' => $data,
      'contactList' => $contact
    ]);
  }
  public function delete(int $id)
  {
    $clienteRepository = $this->em->getRepository(Cliente::class);
    $clienteRepository->delete($id);
    header("location: /clients");
  }
  public function insert()
  {
    if (count($_POST)) {
      $clienteRepository = $this->em->getRepository(Cliente::class);
      $clienteRepository->insert($_POST);
      header("location: /clients");
    } else {
      $empRepository = $this->em->getRepository(Emp::class);
      $contact = $empRepository->findAll();
      $this->render("clientInsert.html.twig", [
        'contactList' => $contact
      ]);
    }
  }
}
