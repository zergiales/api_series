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

    public function update($id){
        //cargar Doctrine

        //cargar entityManager

        //cargar repo Serie

        //Find para conseguir objeto
        
        //comprobar si el objeto me llega

        //asignarle los valores al objeto

        //persistir en doctrine

        //guardar enbd

        //respuesta
    }
}
