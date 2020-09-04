<?php

namespace App\Repository;

use App\Entity\PagoPersonal;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PagoPersonal|null find($id, $lockMode = null, $lockVersion = null)
 * @method PagoPersonal|null findOneBy(array $criteria, array $orderBy = null)
 * @method PagoPersonal[]    findAll()
 * @method PagoPersonal[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PagoPersonalRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PagoPersonal::class);
    }

    // /**
    //  * @return PagoPersonal[] Returns an array of PagoPersonal objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PagoPersonal
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
