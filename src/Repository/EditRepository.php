<?php

namespace App\Repository;

use App\Entity\Edit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Edit|null find($id, $lockMode = null, $lockVersion = null)
 * @method Edit|null findOneBy(array $criteria, array $orderBy = null)
 * @method Edit[]    findAll()
 * @method Edit[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EditRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Edit::class);
    }

    // /**
    //  * @return Edit[] Returns an array of Edit objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Edit
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
