<?php

namespace App\Repository;

use App\Entity\CartaFianza;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CartaFianza|null find($id, $lockMode = null, $lockVersion = null)
 * @method CartaFianza|null findOneBy(array $criteria, array $orderBy = null)
 * @method CartaFianza[]    findAll()
 * @method CartaFianza[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CartaFianzaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CartaFianza::class);
    }

    // /**
    //  * @return CartaFianza[] Returns an array of CartaFianza objects
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
    public function findOneBySomeField($value): ?CartaFianza
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
