<?php

namespace app\Controller;

use app\Entity\Clientes;
use Doctrine\ORM\EntityManager;
use app\Core\AbstractController;
use app\Entity\Emp; 

class CrudController extends AbstractController
{
  private $repository;
  private $repository2;
  public function __construct(EntityManager $em)
  {
    $this->repository = $em->getRepository(Clientes::class);
    $this->repository2 = $em->getRepository(Emp::class); 
    parent::__construct();
  }
  public function update(int $clienteCod)
  {
    if(count($_POST) > 0){
      $data = $this->repository->update($clienteCod);
      header("location: /clientes");
    }else{
      $data = $this->repository->find($clienteCod);
      $dataEmp = $this->repository2->findAll();
      $this->render("update.html.twig", [
        "clienteCod" => $data->getClienteCod(),
        "nombre" => $data->getNombre(),
        "direc" => $data->getDirec(),
        "ciudad" => $data->getCiudad(),
        "estado" => $data->getEstado(),
        "codPostal" => $data->getCodPostal(),
        "area" => $data->getArea(),
        "telefono" => $data->getTelefono(),
        "reprCod" => $data->getReprCod(),
        "limiteCredito" => $data->getLimiteCredito(),
        "observaciones" => $data->getObservaciones(),
        "data" => $dataEmp
    ]);
    }
  }
  public function delete(int $clienteCod)
  {
    $data = $this->repository->delete($clienteCod);
    header("location: /clientes");
  }
  public function insert()
  {
    
    if(count($_POST) > 0){
      $data = $this->repository->insert();
      header("location: /clientes");
    }else{
      $this->render("insert.html.twig", [
      
    ]);
    }
  }
}
