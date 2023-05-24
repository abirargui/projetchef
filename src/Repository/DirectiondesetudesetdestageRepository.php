<?php

namespace App\Repository;

use App\Entity\Directiondesetudesetdestage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Directiondesetudesetdestage>
 *
 * @method Directiondesetudesetdestage|null find($id, $lockMode = null, $lockVersion = null)
 * @method Directiondesetudesetdestage|null findOneBy(array $criteria, array $orderBy = null)
 * @method Directiondesetudesetdestage[]    findAll()
 * @method Directiondesetudesetdestage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DirectiondesetudesetdestageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Directiondesetudesetdestage::class);
    }

    public function add(Directiondesetudesetdestage $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Directiondesetudesetdestage $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return Directiondesetudesetdestage[] Returns an array of Directiondesetudesetdestage objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('d.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Directiondesetudesetdestage
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
