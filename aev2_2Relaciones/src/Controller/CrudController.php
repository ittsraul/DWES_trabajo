<?php

namespace app\Controller;

use app\Entity\Clientes;
use Doctrine\ORM\EntityManager;
use app\Core\AbstractController;
use app\Entity\Emp; 

class CrudController extends AbstractController
{
  private $repository;
  private $Emprepository;
  public function __construct(EntityManager $em)
  {
    $this->repository = $em->getRepository(Clientes::class);
    $this->Emprepository = $em->getRepository(Emp::class); 
    parent::__construct();
  }
  public function update(int $clienteCod)
  {
    if(count($_POST)) $this->repository->update($clienteCod, $_POST);
      $data = $this->repository->find($clienteCod);
      $contact = $this->Emprepository->findAll();
      $this->render("update.html.twig", [
        "data" => $data,
        "conctactList" => $contact
    ]);
  }
  public function delete(int $clienteCod)
  {
    $data = $this->repository->delete($clienteCod);
    header("location: /clientes");
  }
  public function insert()
  {
    if(count($_POST)){
      $data = $this->repository->insert($_POST);
      header("location: /clientes");
    }else{
      $contact = $this->Emprepository->findAll();
      $this->render("insert.html.twig", [
        "contactList" => $contact
    ]);
    }
  }
  
}
