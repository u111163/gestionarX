<?php

namespace App\Repository;

use App\Entity\CuentaCredito;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CuentaCredito|null find($id, $lockMode = null, $lockVersion = null)
 * @method CuentaCredito|null findOneBy(array $criteria, array $orderBy = null)
 * @method CuentaCredito[]    findAll()
 * @method CuentaCredito[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CuentaCreditoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CuentaCredito::class);
    }

    // /**
    //  * @return CuentaCredito[] Returns an array of CuentaCredito objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CuentaCredito
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
