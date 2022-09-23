<?php

namespace App\Repository;

use App\Entity\Serie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class PruebaRepository extends ServiceEntityRepository{

     public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Serie::class);
    }

    public function getSeriesByOrder($order){
        //query builder para sacar las series cuyo creador se llame gabriel
        $qb = $this->createQueryBuilder('s')
            // ->andWhere("s.creador ='gabriel '")
            // ->orWhere("s.anio =2022")
            ->orderBy('s.id', 'DESC')
            ->getQuery();

        $resulset = $qb->execute();
        $coleccion = array(
            'name' => 'coleccion de series',
            'series' => $resulset
        );

        return $coleccion;
    }    
    
}