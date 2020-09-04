<?php

namespace App\Repository;

use App\Entity\Vencimiento;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Vencimiento|null find($id, $lockMode = null, $lockVersion = null)
 * @method Vencimiento|null findOneBy(array $criteria, array $orderBy = null)
 * @method Vencimiento[]    findAll()
 * @method Vencimiento[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VencimientoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Vencimiento::class);
    }

    // /**
    //  * @return Vencimiento[] Returns an array of Vencimiento objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Vencimiento
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
