<?php

namespace App\Repository;

use App\Entity\AlerteQualite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AlerteQualite>
 */
class AlerteQualiteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AlerteQualite::class);
    }

    //    /**
    //     * @return AlerteQualite[] Returns an array of AlerteQualite objects
    //     */
       public function getSorted(): array
       {
           return $this->createQueryBuilder('a')
               ->orderBy('a.lu', 'ASC')
               ->getQuery()
               ->getResult()
           ;
       }

    //    public function findOneBySomeField($value): ?AlerteQualite
    //    {
    //        return $this->createQueryBuilder('a')
    //            ->andWhere('a.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
