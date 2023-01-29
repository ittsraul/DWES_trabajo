<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DetailController extends AbstractController
{
    #[Route('/detail/{parametro}', name: 'app_detail')]
    public function detail(string $parametro): Response
    {
        return $this->render('detail.html.twig', [
            'controller_name' => 'DetailController',
            'parametro' => $parametro,
        ]);
    }
}
