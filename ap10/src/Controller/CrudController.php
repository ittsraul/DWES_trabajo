<?php

namespace App\Controller;

use App\Entity\Clientes;
use App\Entity\Empresa;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/crud', name: 'app_')]
class CrudController extends AbstractController
{
     #[Route('/insert', name: 'insert')]
    public function index(ManagerRegistry $gestor, Request $request): Response
    {
        $container = $request->request->all();
        if (count($container) > 1) {
             $gestor->getRepository(Clientes::class)->insert($request); 
            return $this->redirect($this->generateUrl("app_list"));
        } else {
            /* $clients = $gestor->getRepository(Clientes::class)->findAll(); */
            $emps = $gestor->getRepository(Empresa::class)->findAll();
            return $this->render('insert.html.twig', [
                /* "clients" => $clients, */
                "emps" => $emps,
            ]);
        }
    }

    #[Route('/delete/{user}', name: 'delete')]
    public function delete(ManagerRegistry $gestor, int $user): Response
    {
         $gestor->getRepository(Clientes::class)->delete($user); 
        return $this->redirect($this->generateUrl('app_list'));
    }

    #[Route('/update/{user}', name: 'update')]
    public function update(ManagerRegistry $gestor, Request $request, int $user): Response
    {
    $container = $request->request->all();
        if (count($container) > 1) {
             $gestor->getRepository(Clientes::class)->update($request, $user); 
            return $this->redirect($this->generateUrl("app_list"));
        } else {
            $clients = $gestor->getRepository(Clientes::class)->find($user);
            $emps = $gestor->getRepository(Empresa::class)->findAll();
            return $this->render('update.html.twig', [
                "clients" => $clients,
                "emps" => $emps 
            ]);
        }
    } 
}
