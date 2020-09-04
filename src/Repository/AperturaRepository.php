<?php

namespace App\Repository;

use App\Entity\Apertura;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Apertura|null find($id, $lockMode = null, $lockVersion = null)
 * @method Apertura|null findOneBy(array $criteria, array $orderBy = null)
 * @method Apertura[]    findAll()
 * @method Apertura[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AperturaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Apertura::class);
    }

    // /**
    //  * @return Apertura[] Returns an array of Apertura objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Apertura
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
