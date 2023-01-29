<?php

namespace app\Controller;

use app\Entity\Recordings;
use app\Entity\Players;
use Doctrine\ORM\EntityManager;
use app\Core\AbstractController;
Class GameController extends AbstractController
{
    public function __construct(EntityManager $em)
    {
      $this->repository = $em->getRepository(Players::class);
      parent::__construct();
    }
    public function Game()
    {
        /* $game = $empRepository->findAll(); */
        $this->render("game.html.twig", [
          /* 'gameStart' => $game */
        ]);
    }
    }

