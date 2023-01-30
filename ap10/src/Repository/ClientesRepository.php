<?php

namespace App\Repository;

use App\Entity\Clientes;
use App\Entity\Empresa;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;

/**
 * @extends ServiceEntityRepository<Clientes>
 *
 * @method Clientes|null find($id, $lockMode = null, $lockVersion = null)
 * @method Clientes|null findOneBy(array $criteria, array $orderBy = null)
 * @method Clientes[]    findAll()
 * @method Clientes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClientesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Clientes::class);
    }


    //Funcion que con lo pasado por get, se lo pasa a el getter y lo aplica por save(), funcion nativa de symfony
    public function insert(array $data): void{
        //Variable objeto
        $NewClient = new Clientes();
        //setter del contenido pasado por request(post raro)
        $empleado = $this->getEntityManager()->getRepository(Empresa::class)->find($data["reprCod"]);
        $NewClient->setClienteCod($data["clienteCod"])
        ->setNombre($data["nombre"])
        ->setDirec($data["direc"])
        ->setCiudad($data["ciudad"])
        ->setEstado($data["estado"])
        ->setCodPostal($data["codPostal"])
        ->setArea($data["area"])
        ->setTelefono($data["telefono"])
        ->setReprCod($empleado)
        ->setlimiteCredito($data["limiteCredito"])
        ->setObservaciones($data["observaciones"]);
        //insertamos con la funcion save que nos dan
        $this->save($NewClient, true);
    }
    public function save(Clientes $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }


    //Borramos delete de 0, debido a que el array que nos retorna, contiene muchos datos a parte.
    public function delete(int $user): void
    {
        $delete= $this->findBy(["clienteCod" => $user]);
        /*var_dump($delete)*/
        $this->remove($delete[0], true);
    }


    //Copiapega de Insert()
    public function update(Request $request, int $user): void
    {
        //Variable objeto
        $changeClient = $this->findBy(["clienteCod" => $user]);
        //setter del contenido pasado por request(post raro)
        $empleado = $this->getEntityManager()->getRepository(Empresa::class)->find($request->request->get("reprCod"));
        $changeClient[0]->setClienteCod($request->request->get("clienteCod"))
        ->setNombre($request->request->get("nombre"))
        ->setDirec($request->request->get("direc"))
        ->setCiudad($request->request->get("ciudad"))
        ->setEstado($request->request->get("estado"))
        ->setCodPostal($request->request->get("codPostal"))
        ->setArea($request->request->get("area"))
        ->setTelefono($request->request->get("telefono"))
        ->setReprCod($empleado)
        ->setlimiteCredito($request->request->get("limiteCredito"))
        ->setObservaciones($request->request->get("observaciones"));
        //insertamos con la funcion save que nos dan
        $this->save($changeClient[0], true);
    }

    public function remove(Clientes $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

}
