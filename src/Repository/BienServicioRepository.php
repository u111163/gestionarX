<?php

namespace App\Repository;

use App\Entity\BienServicio;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BienServicio|null find($id, $lockMode = null, $lockVersion = null)
 * @method BienServicio|null findOneBy(array $criteria, array $orderBy = null)
 * @method BienServicio[]    findAll()
 * @method BienServicio[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BienServicioRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BienServicio::class);
    }

    // /**
    //  * @return BienServicio[] Returns an array of BienServicio objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?BienServicio
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
