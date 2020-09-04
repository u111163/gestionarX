<?php

namespace App\Repository;

use App\Entity\OrdenProducto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method OrdenProducto|null find($id, $lockMode = null, $lockVersion = null)
 * @method OrdenProducto|null findOneBy(array $criteria, array $orderBy = null)
 * @method OrdenProducto[]    findAll()
 * @method OrdenProducto[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OrdenProductoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OrdenProducto::class);
    }

    // /**
    //  * @return OrdenProducto[] Returns an array of OrdenProducto objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?OrdenProducto
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
