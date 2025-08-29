<?php

namespace App\Repository;

use App\Entity\AlerteDecharge;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AlerteDecharge>
 */
class AlerteDechargeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AlerteDecharge::class);
    }

    //    /**
    //     * @return AlerteDecharge[] Returns an array of AlerteDecharge objects
    //     */
       public function getSorted(): array
       {
           return $this->createQueryBuilder('a')
               ->orderBy('a.lu', 'ASC')
               ->getQuery()
               ->getResult()
           ;
       }

    //    public function findOneBySomeField($value): ?AlerteDecharge
    //    {
    //        return $this->createQueryBuilder('a')
    //            ->andWhere('a.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
