<?php

namespace App\Controller;

use App\Entity\Empresa;
use App\Entity\Clientes;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CrudController extends AbstractController
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }
     #[Route('/insert', name: 'app_insert')]
    public function insert(Request $request): Response
    {
        if (!is_null($request)) {
            //Si queremos pillar todos
            $result=$request->request->all();
            //Si queremos pillar uno
            /* $result=$request->request->getNombre(); */

            var_dump($result);
        }
        $cliente = new Clientes();
        $cliente ->$this->em->getRepository(Clientes::class)->find();
        return $this->render('insert.html.twig', [
            'id' => 'setId()',
            'name' => 'setName()',
        ]);
    }
    #[Route('/update', name: 'app_update')]
    public function update($id)
    {
        return $this->render('update.html.twig', [
            'name' => 'CrudController',
        ]);
    }
    #[Route('/delete', name: 'app_delete')]
    public function delete(int $ClienteCod, EntityManager $entityManager): Response
    {
        $entityManager->remove($ClienteCod);
        return $this->render('delete.html.twig', [
            'name' => 'CrudController',
        ]);
    } 
}
