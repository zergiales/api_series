<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Serie;

class SeriesController extends AbstractController
{

    public function index(): Response
    {
        //creamos el repositorio que va a sacar todas las series

        //cargar un repositorio personalizado
        $serie_repo = $this->getDoctrine()
            ->getRepository(Serie::class);
        //consulta
        $ver_series = $serie_repo->findAll();

        return $this->render('series/index.html.twig', [
            'controller_name' => 'SeriesController',
            'series' => $ver_series 
        ]);
    }

    public function guardar(){
        //guardar en una tabla de la base de datos
        $entityManager = $this->getDoctrine()->getManager();

        //creo el objeto y  le doy valores
        $serie = new Serie();
        $serie->setNombre('serie de ejemplo');
        $serie->setCreador(' sergio');
        $serie->setAnio(2022);


        // Guardar objetos en doctrine
        $entityManager->persist($serie);

        //volcar datos en la tabla o guardar
        $entityManager->flush();

        return new Response('la serie guardada tiene el id: '.$serie->getId());
    }

    public function ver(int $id): Response
    {
        //cargar un repositorio personalizado
        $serie_repo = $this->getDoctrine()
        ->getRepository(Serie::class)
        //consulta
        ->find($id);

        //comprobar si el resultado es correcto
        if (!$serie_repo) {
            throw $this->createNotFoundException(
                'No esta la serie con el id: ' . $id
            );
        }else{
            $message = 'La serie es: '.$serie_repo->getNombre().' y su director es: '.$serie_repo->getCreador().' y se hizo
            en el año: '.$serie_repo->getAnio();
        }
        return new Response($message);
    }

    public function actualizar($id){
        //cargar Doctrine
        $doctrine = $this->getDoctrine();
        //cargar entityManager
        $em = $doctrine->getManager();
        //cargar repo Serie
        $serie_repo = $em->getRepository(Serie::class);
        //Find para conseguir objeto
        $serie = $serie_repo->find($id);
        //comprobar si el objeto me llega
        if (!$serie) {
            $message = 'La serie no existe en la base de datos';
        }else{
            //asignarle los valores al objeto
            $serie->setNombre("serie por defecto $id");
            $serie->setCreador('creador por defecto');
            $serie->setAnio('2022');
            //persistir en doctrine
            $em->persist($serie);
            //guardar enbd
            $em->flush();

            $message = 'Has actualizado la serie '.$serie->getId();
        }
        //respuesta
        return new Response($message);
    }
}
