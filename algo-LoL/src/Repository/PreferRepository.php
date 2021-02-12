<?php

namespace App\Repository;

use App\Entity\Prefer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Prefer|null find($id, $lockMode = null, $lockVersion = null)
 * @method Prefer|null findOneBy(array $criteria, array $orderBy = null)
 * @method Prefer[]    findAll()
 * @method Prefer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PreferRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Prefer::class);
    }

    // /**
    //  * @return Prefer[] Returns an array of Prefer objects
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
    public function findOneBySomeField($value): ?Prefer
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
