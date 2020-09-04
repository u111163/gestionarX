<?php

namespace App\Repository;

use App\Entity\TipoComprobante;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TipoComprobante|null find($id, $lockMode = null, $lockVersion = null)
 * @method TipoComprobante|null findOneBy(array $criteria, array $orderBy = null)
 * @method TipoComprobante[]    findAll()
 * @method TipoComprobante[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TipoComprobanteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TipoComprobante::class);
    }

    // /**
    //  * @return TipoComprobante[] Returns an array of TipoComprobante objects
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
    public function findOneBySomeField($value): ?TipoComprobante
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
