<?php

namespace App\Controller;

use App\Entity\Producto;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MainController extends AbstractController
{
    #[Route('/producto/{id}', name: 'app_main_get', methods: ["GET"])]
    public function index(int $id, EntityManagerInterface $em): JsonResponse
    {
        $producto = $em->getRepository(Producto::class)->find($id);
        $data = [
            "id" => $producto->getId(),
            "nombre"=> $producto->getNombre(),
            "fecha"=> $producto->getCaducidad()->format('d/m/Y')
        ];
        return $this->json($data);
    }
    #[Route('/producto', name: 'app_main_post', methods: ["POST"])]
    public function index2(Request $request, EntityManagerInterface $em): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $newprod = new Producto();
        $newprod 
            ->setNombre($data["nombre"])
            ->setCaducidad(DateTime::createFromFormat('d/m/Y', $data["fecha"]));
        $em->getRepository(Producto::class)->save($newprod, true);
        return $this->json([
            'message' => "Se ha cambiado"
        ]);
    }
    #[Route('/producto/{id}', name: 'app_main_delete', methods: ["DELETE"])]
    public function delete(EntityManagerInterface $em, int $id): JsonResponse
    {
        $producto = $em->getRepository(Producto::class)->find($id);
        $em->getRepository(Producto::class)->remove($producto, true);
        return $this->json([
            'message' => "Borrado correcto"
        ]);
    }
    #[Route('/producto/{id}', name: 'app_main_put', methods: ["PUT"])]
    public function update(EntityManagerInterface $em, Request $request, int $id): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $newprod = $em->getRepository(Producto::class)->find($id);
        $newprod 
            ->setNombre($data["nombre"])
            ->setCaducidad(DateTime::createFromFormat('d/m/Y', $data["fecha"]));
            $em->getRepository(Producto::class)->save($newprod, true);
        return $this->json([
            'message' => "cambiado"
        ]);
    }
}
