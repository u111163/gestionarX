<?php

namespace App\Repository;

use App\Entity\TipoPago;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TipoPago|null find($id, $lockMode = null, $lockVersion = null)
 * @method TipoPago|null findOneBy(array $criteria, array $orderBy = null)
 * @method TipoPago[]    findAll()
 * @method TipoPago[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TipoPagoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TipoPago::class);
    }

    // /**
    //  * @return TipoPago[] Returns an array of TipoPago objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TipoPago
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
