<?php

namespace App\Repository;

use App\Entity\AlerteQualite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Formation;
use Psr\Log\LoggerInterface;

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

    public function getSortedByFilter($formation, $stagiaire): array
    {

        $qb = $this->createQueryBuilder("a");

        $expr = $qb->expr();

        if ($formation && !$stagiaire) {
            return $qb
                ->where('a.formation = :formation')
                ->setParameter('formation', $formation)
                ->orderBy('a.lu', 'ASC')
                ->getQuery()
                ->getResult()
            ;
        } else if ($formation && $stagiaire) {
            $parties = explode(' ', trim($stagiaire), 2);

            [$nom, $prenom] = $parties;

            if ($prenom === "undefined") {

                return $qb
                    ->where('a.formation = :formation')
                    ->leftJoin('a.stagiaire', 's')
                    ->andWhere(
                        $expr->orX(
                            $expr->like('LOWER(s.nom)', ':stagiaireNom'),
                            $expr->like('LOWER(s.prenom)', ':stagiaireNom')
                        )
                    )
                    ->setParameter('stagiaireNom', "%" .  $nom . "%")
                    ->setParameter('formation', "%" .  $formation)
                    ->orderBy('a.lu', 'ASC')
                    ->getQuery()
                    ->getResult();
            }


            return $qb
                ->where('a.formation = :formation')
                ->leftJoin('a.stagiaire', 's')
                ->andWhere(
                    $expr->orX(
                        $expr->andX(
                            $expr->like('LOWER(s.nom)', ':stagiaireNom'),
                            $expr->like('LOWER(s.prenom)', ':stagiairePrenom')
                        ),
                        $expr->andX(
                            $expr->like('LOWER(s.nom)', ':stagiairePrenom'),
                            $expr->like('LOWER(s.prenom)', ':stagiaireNom')
                        )
                    )
                )
                ->setParameter('stagiaireNom', "%" . $nom . "%")
                ->setParameter('stagiairePrenom',"%" .  $prenom . "%")
                ->setParameter('formation', $formation)
                ->orderBy('a.lu', 'ASC')
                ->getQuery()
                ->getResult();
        } else {
            $parties = explode(' ', trim($stagiaire), 2);

            [$nom, $prenom] = $parties;

            if ($prenom === "undefined") {

                return $qb
                    ->leftJoin('a.stagiaire', 's')
                    ->andWhere(
                        $expr->orX(
                            $expr->like('LOWER(s.nom)', ':stagiaireNom'),
                            $expr->like('LOWER(s.prenom)', ':stagiaireNom')
                        )
                    )
                    ->setParameter('stagiaireNom', "%" .  $nom . "%")
                    ->orderBy('a.lu', 'ASC')
                    ->getQuery()
                    ->getResult();
            }


            return $qb
                ->leftJoin('a.stagiaire', 's')
                ->andWhere(
                    $expr->orX(
                        $expr->andX(
                            $expr->like('LOWER(s.nom)', ':stagiaireNom'),
                            $expr->like('LOWER(s.prenom)', ':stagiairePrenom')
                        ),
                        $expr->andX(
                            $expr->like('LOWER(s.nom)', ':stagiairePrenom'),
                            $expr->like('LOWER(s.prenom)', ':stagiaireNom')
                        )
                    )
                )
                ->setParameter('stagiaireNom', "%" .  $nom . "%")
                ->setParameter('stagiairePrenom', "%" .  $prenom . "%")
                ->orderBy('a.lu', 'ASC')
                ->getQuery()
                ->getResult();
        }
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
