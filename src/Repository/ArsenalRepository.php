<?php

namespace App\Repository;

use App\Entity\Arsenal;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Arsenal|null find($id, $lockMode = null, $lockVersion = null)
 * @method Arsenal|null findOneBy(array $criteria, array $orderBy = null)
 * @method Arsenal[]    findAll()
 * @method Arsenal[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArsenalRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Arsenal::class);
    }

    // /**
    //  * @return Arsenal[] Returns an array of Arsenal objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Arsenal
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
