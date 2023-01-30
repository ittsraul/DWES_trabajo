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
    #[Route('/detail/{user?null}', name: 'app_detail_empresa')]
    public function index(ManagerRegistry $gestor, string $user): Response
    {
        $emps = $gestor->getManager()->getRepository(Empresa::class);
        $detalleEmpresa = $emps->find($user);
        return $this->render('detail.html.twig', [
            'detalleClient' => $detalleEmpresa 
        ]);
    }
}
