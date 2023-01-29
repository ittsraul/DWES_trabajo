<?php

namespace App\Controller;

use App\Entity\Clientes;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ListController extends AbstractController
{
    #[Route('/list/{page?}', name: 'app_list')]
    public function index(ManagerRegistry $gestor, $page = null, SessionInterface $session): Response
    {
        $clients = $gestor->getRepository(Clientes::class)->findAll();
        return $this->render('clientes.html.twig', [
            'clients' => $clients,
            "page" => $this->getLastPage($session, $page)
        ]);
    }


    //paginacion de david
    private function getLastPage(SessionInterface $session, $page)
    {
      if ($page != null) {
        $session->set("page", $page);
        return $page;
      } elseif (!$session->has("page") || !is_numeric($session->get("page"))) {
        $session->set("page", 1) ;
        return 1;
      }
      return $session->get("page");
    }
}
