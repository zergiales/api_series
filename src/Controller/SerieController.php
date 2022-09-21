<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SerieController extends AbstractController
{
    /**
     * @Route("/serie", name="app_serie")
     */
    public function index(): Response
    {
        return $this->render('serie/index.html.twig', [
            'controller_name' => 'SerieController',
            'nombre_serie' => 'nombre de la serie',
        ]);
    }
    public function buscar($nombre, $creador){
        $title = 'bienvenido al buscador de series';
        $series = array('serie1','serie2','serie3');
        $serie_aso = array(
           'nombre' => 'nombre_serie0',
            'creador' => 'creador_serie0',
            'año' => 2015
        );


        return $this->render('serie/buscar.html.twig', [
            'title' => $title,
            'nombre' => $nombre,
            'creador' => $creador,
            'series' => $series,
            'serie_aso' => $serie_aso,
        ]);
    }
    public function mostrar(){
        // return $this->redirectToRoute('index',array(), 301);
        // return $this->redirectToRoute('buscar',[
        //     'nombre' => 'Breaking bad',
        //     'creador' => 'americano'
        // ]);
        return $this->redirect('https://www.netflix.com/es/');
    }
}
