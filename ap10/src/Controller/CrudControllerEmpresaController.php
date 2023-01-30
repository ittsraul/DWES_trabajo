<?php
namespace App\Controller;

use App\Entity\Clientes;
use App\Entity\Empresa;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/crud', name: 'app_')]
class CrudController extends AbstractController
{
     #[Route('/insert', name: 'insert_empresa', Method: ["POST"])]
    public function insert(ManagerRegistry $gestor, Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        if (count($data) > 1) {
             $gestor->getRepository(Clientes::class)->insert($data); 
            return $this->json([
                'mensage' => 'Funsiona bien'
                
            ]);
        }
    }

    #[Route('/delete/{user}', name: 'delete', method: ["DELETE"])]
    public function delete(ManagerRegistry $gestor, int $user): JsonResponse
    {
         $gestor->getRepository(Empresa::class)->delete($user); 
        return $this->redirect($this->generateUrl('app_list_empresa'));
    }

    #[Route('/update/{user}', name: 'update', methods: ["PUT"])]
    public function update(ManagerRegistry $gestor, Request $request, int $user): JsonResponse
    {
    $container = $request->request->all();
        if (count($container) > 1) {
             $gestor->getRepository(Empresa::class)->update($request, $user); 
            return $this->redirect($this->generateUrl("app_list_empresa"));
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
