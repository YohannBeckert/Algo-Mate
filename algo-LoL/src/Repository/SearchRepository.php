<?php

namespace App\Repository;

use App\Entity\Search;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Search|null find($id, $lockMode = null, $lockVersion = null)
 * @method Search|null findOneBy(array $criteria, array $orderBy = null)
 * @method Search[]    findAll()
 * @method Search[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SearchRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Search::class);
    }

    // /**
    //  * @return Search[] Returns an array of Search objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Search
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    public function findAllExceptThis($actualUser)
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = '
            SELECT * FROM `search`
            WHERE `user_id` != ' . $actualUser . '
               '
        ;

        $stmt = $conn->prepare($sql);
        $stmt->execute([]);

        return $stmt->fetchAllAssociative();
    }

    public function findSameGoalMate($actualUserId,$auCountry,$auCountryInGame,$auSoloRank,$auFlexRank,$auFirstRole,$auSecondRole)
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = '
            SELECT * FROM `search`
            WHERE `user_id` != ' . $actualUserId . '
            AND `country` = "' .$auCountry. '"
            AND `country_in_game` = "' .$auCountryInGame. '"
            AND `solo_rank` = "' .$auSoloRank. '"
            AND `flex_rank` = "' .$auFlexRank. '"
            AND `first_role` = "' .$auFirstRole. '"
            AND `second_role` = "' .$auSecondRole. '"
               '
        ;

        $stmt = $conn->prepare($sql);
        $stmt->execute([]);

        return $stmt->fetchAllAssociative();
    }

    public function findGoalCountry($actualUserId,$auCountry)
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = '
            SELECT * FROM `search`
            WHERE `user_id` != ' . $actualUserId . '
            AND `country` = "' .$auCountry. '"
               '
        ;

        $stmt = $conn->prepare($sql);
        $stmt->execute([]);

        return $stmt->fetchAllAssociative();
    }

    public function findGoalCountryInGame($actualUserId,$auCountryInGame)
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = '
            SELECT * FROM `search`
            WHERE `user_id` != ' . $actualUserId . '
            AND `country` = "' .$auCountryInGame. '"
               '
        ;

        $stmt = $conn->prepare($sql);
        $stmt->execute([]);

        return $stmt->fetchAllAssociative();
    }
}
