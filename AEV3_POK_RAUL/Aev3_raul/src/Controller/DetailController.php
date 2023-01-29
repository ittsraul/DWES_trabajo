<?php

namespace App\Controller;

use App\Entity\Clientes;
use App\Entity\Empresa;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DetailController extends AbstractController
{
    #[Route('/detail/{user?null}', name: 'app_detail')]
    public function index(ManagerRegistry $gestor, string $user): Response
    {
        $cliente = $gestor->getManager()->getRepository(Clientes::class);
        $detalleClient = $cliente->find($user);
        return $this->render('detail.html.twig', [
            'detalleClient' => $detalleClient 
        ]);
    }
}
