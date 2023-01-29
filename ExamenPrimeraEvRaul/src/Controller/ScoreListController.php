<?php

namespace app\Controller;

use Doctrine\ORM\EntityManager;
use app\Core\AbstractController;
use app\Entity\Players; 

class ScoreListController extends AbstractController
{
  private $repository;
  public function __construct(EntityManager $em)
  {
    $this->repository = $em->getRepository(Players::class);
    parent::__construct();
  }
  public function List() : void
  {
    $data = $this->repository->findAll();
    $this->render("ScoreList.html.twig", [
      "data" => $data
    ]);
  }

}
