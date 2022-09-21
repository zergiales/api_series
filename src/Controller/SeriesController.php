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
        return $this->render('series/index.html.twig', [
            'controller_name' => 'SeriesController',
        ]);
    }

    public function guardar(){
        //guardar en una tabla de la base de datos
        $entityManager = $this->getDoctrine()->getManager();

        //creo el objeto y  le doy valores
        $serie = new Serie();
        $serie->setNombre('Suits');
        $serie->setCreador(' Gabriel Macht');
        $serie->setAnio(2011);


        // Guardar objetos en doctrine
        $entityManager->persist($serie);

        //volcar datos en la tabla o guardar
        $entityManager->flush();

        return new Response('la serie guardada tiene el id: '.$serie->getId());
    }

    public function ver($id){
        return new Response('hola desde ver');
    }
}
