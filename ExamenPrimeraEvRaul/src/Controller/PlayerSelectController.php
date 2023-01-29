<?php


namespace app\Controller;

use app\Entity\Recordings;
use app\Entity\Players;
use Doctrine\ORM\EntityManager;
use app\Core\AbstractController;

class PlayerSelectController extends AbstractController
{
    public function __construct(EntityManager $em)
    {
      $this->repository = $em->getRepository(Players::class);
      parent::__construct();
    }
    public function PlayerSelect() : void
    {
      /* $data = $this->repository->getRepository(); */
      $this->render("PlayerSelect.html.twig", [
        /* 'gameStart' => $data, */
      ]);
    }
}


?>