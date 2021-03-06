<?php

namespace App\Repository;

use App\Entity\CustomerAttributes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CustomerAttributes|null find($id, $lockMode = null, $lockVersion = null)
 * @method CustomerAttributes|null findOneBy(array $criteria, array $orderBy = null)
 * @method CustomerAttributes[]    findAll()
 * @method CustomerAttributes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CustomerAttributesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CustomerAttributes::class);
    }

    // /**
    //  * @return CustomerAttributes[] Returns an array of CustomerAttributes objects
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
    public function findOneBySomeField($value): ?CustomerAttributes
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
