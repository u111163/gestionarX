<?php

namespace App\Repository;

use App\Entity\TipoCambio;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TipoCambio|null find($id, $lockMode = null, $lockVersion = null)
 * @method TipoCambio|null findOneBy(array $criteria, array $orderBy = null)
 * @method TipoCambio[]    findAll()
 * @method TipoCambio[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TipoCambioRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TipoCambio::class);
    }

    // /**
    //  * @return TipoCambio[] Returns an array of TipoCambio objects
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
    public function findOneBySomeField($value): ?TipoCambio
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
