<?php

namespace app\Controller;

use Doctrine\ORM\EntityManager;
use app\Core\AbstractController;
use app\Entity\Cliente;

class ClientsController extends AbstractController
{
  private $repository;
  public function __construct(EntityManager $em)
  {
    $this->repository = $em->getRepository(Cliente::class);
    parent::__construct();
  }
  public function main($page = null)
  {
    $data = $this->repository->findAll();
    $this->render("clientList.html.twig", [
      "data" => $data,
      "page" => $this->getLastPage($page)
    ]);
  }

  private function getLastPage($page)
  {
    if ($page != null) {
      $_SESSION["page"] = $page;
      return $page;
    } elseif (!isset($_SESSION["page"]) || !is_numeric($_SESSION["page"])) {
      $_SESSION["page"] = 1;
      return 1;
    }
    return $_SESSION["page"];
  }
}
