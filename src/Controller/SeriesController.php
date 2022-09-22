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
        //cargar un repositorio personalizado
        $serie_repo = $this->getDoctrine()->getRepository(Serie::class);

        //consulta
        $serie = $serie_repo->find($id);

        //comprobar si el resultado es correcto
        if (!$serie) {
            $message = 'La serie no existe';
        }else{
            $message = 'La serie es: '.$serie->getNombre().' y su director es: '.$serie->getCreador().' y se hizo
            en el año: '.$serie->getAnio();
        }
        return new Response($message);
    }
}
