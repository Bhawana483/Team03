<?php

namespace App\Repository;

use App\Entity\ClothCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ClothCategory|null find($id, $lockMode = null, $lockVersion = null)
 * @method ClothCategory|null findOneBy(array $criteria, array $orderBy = null)
 * @method ClothCategory[]    findAll()
 * @method ClothCategory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClothCategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ClothCategory::class);
    }

    // /**
    //  * @return ClothCategory[] Returns an array of ClothCategory objects
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
    public function findOneBySomeField($value): ?ClothCategory
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
