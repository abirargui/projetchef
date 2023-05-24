<?php

namespace App\Repository;

use App\Entity\DirecteurDeDepart;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DirecteurDeDepart>
 *
 * @method DirecteurDeDepart|null find($id, $lockMode = null, $lockVersion = null)
 * @method DirecteurDeDepart|null findOneBy(array $criteria, array $orderBy = null)
 * @method DirecteurDeDepart[]    findAll()
 * @method DirecteurDeDepart[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DirecteurDeDepartRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DirecteurDeDepart::class);
    }

    public function add(DirecteurDeDepart $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(DirecteurDeDepart $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return DirecteurDeDepart[] Returns an array of DirecteurDeDepart objects
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

//    public function findOneBySomeField($value): ?DirecteurDeDepart
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
