<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ListController extends AbstractController
{
    #[Route('/list', name: 'app_list')]
    public function index(): Response
    {
        $clients = $gestor->getManager()->getRepository(Product::class)->findAll();
        return $this->render('list/index.html.twig', [
            'controller_name' => 'ListController',
        ]);
    }
}
