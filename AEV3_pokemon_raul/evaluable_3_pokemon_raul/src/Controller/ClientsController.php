<?php

namespace App\Controller;

use Doctrine\Tests\Models\Enums\Product;
use Symfony\Bridge\Doctrine\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ClientsController extends AbstractController
{
    #[Route('/clients', name: 'app_clients')]
    public function list(ManagerRegistry $gestor): Response
    {
        $clients = $gestor->getManager()->getRepository(Product::class)->findAll();
        return $this->render('clientes.html.twig', [
            'clients' => $clients,
        ]);
    }
}
