<?php

namespace App\Repository;

use App\Entity\CajaChica;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CajaChica|null find($id, $lockMode = null, $lockVersion = null)
 * @method CajaChica|null findOneBy(array $criteria, array $orderBy = null)
 * @method CajaChica[]    findAll()
 * @method CajaChica[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CajaChicaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CajaChica::class);
    }

    // /**
    //  * @return CajaChica[] Returns an array of CajaChica objects
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
    public function findOneBySomeField($value): ?CajaChica
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
