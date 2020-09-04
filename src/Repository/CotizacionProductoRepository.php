<?php

namespace App\Repository;

use App\Entity\CotizacionProducto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CotizacionProducto|null find($id, $lockMode = null, $lockVersion = null)
 * @method CotizacionProducto|null findOneBy(array $criteria, array $orderBy = null)
 * @method CotizacionProducto[]    findAll()
 * @method CotizacionProducto[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CotizacionProductoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CotizacionProducto::class);
    }

    // /**
    //  * @return CotizacionProducto[] Returns an array of CotizacionProducto objects
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
    public function findOneBySomeField($value): ?CotizacionProducto
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
