<?php

namespace app\Controller;

use app\Entity\Recordings;
use app\Entity\Players;
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
    $clienteRepository = $this->em->getRepository(Players::class);
    if (count($_POST)) $clienteRepository->update($id, $_POST);
    $data = $clienteRepository->find($id);
    $empRepository = $this->em->getRepository(Recordings::class);
    $contact = $empRepository->findAll();
    $this->render("clientUpdate.html.twig", [
      'data' => $data,
      'contactList' => $contact
    ]);
  }
    
  public function PlayerSelect()
  {
    if (count($_POST)) {
      $PlayersRepository = $this->em->getRepository(Players::class);
      $PlayersRepository->insert($_POST);
      header("location: /PlayerSelect");
    } else {
      $empRepository = $this->em->getRepository(Recordings::class);
      $game = $empRepository->findAll();
      $this->render("game.html.twig", [
        'gameStart' => $game
      ]);
  }
}
}