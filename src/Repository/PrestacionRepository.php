<?php

namespace App\Repository;

use App\Entity\Prestacion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Prestacion|null find($id, $lockMode = null, $lockVersion = null)
 * @method Prestacion|null findOneBy(array $criteria, array $orderBy = null)
 * @method Prestacion[]    findAll()
 * @method Prestacion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PrestacionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Prestacion::class);
    }

    // /**
    //  * @return Prestacion[] Returns an array of Prestacion objects
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
    public function findOneBySomeField($value): ?Prestacion
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
