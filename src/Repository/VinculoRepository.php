<?php

namespace App\Repository;

use App\Entity\Vinculo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Vinculo|null find($id, $lockMode = null, $lockVersion = null)
 * @method Vinculo|null findOneBy(array $criteria, array $orderBy = null)
 * @method Vinculo[]    findAll()
 * @method Vinculo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VinculoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Vinculo::class);
    }

    // /**
    //  * @return Vinculo[] Returns an array of Vinculo objects
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
    public function findOneBySomeField($value): ?Vinculo
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
