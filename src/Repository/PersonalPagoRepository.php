<?php

namespace App\Repository;

use App\Entity\PersonalPago;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PersonalPago|null find($id, $lockMode = null, $lockVersion = null)
 * @method PersonalPago|null findOneBy(array $criteria, array $orderBy = null)
 * @method PersonalPago[]    findAll()
 * @method PersonalPago[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PersonalPagoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PersonalPago::class);
    }

    // /**
    //  * @return PersonalPago[] Returns an array of PersonalPago objects
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
    public function findOneBySomeField($value): ?PersonalPago
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
