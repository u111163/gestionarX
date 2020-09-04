<?php

namespace App\Repository;

use App\Entity\PuntoVenta;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PuntoVenta|null find($id, $lockMode = null, $lockVersion = null)
 * @method PuntoVenta|null findOneBy(array $criteria, array $orderBy = null)
 * @method PuntoVenta[]    findAll()
 * @method PuntoVenta[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PuntoVentaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PuntoVenta::class);
    }

    // /**
    //  * @return PuntoVenta[] Returns an array of PuntoVenta objects
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
    public function findOneBySomeField($value): ?PuntoVenta
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
