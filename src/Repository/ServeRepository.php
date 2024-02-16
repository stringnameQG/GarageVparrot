<?php

namespace App\Repository;

use App\Entity\Serve;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Serve>
 *
 * @method Serve|null find($id, $lockMode = null, $lockVersion = null)
 * @method Serve|null findOneBy(array $criteria, array $orderBy = null)
 * @method Serve[]    findAll()
 * @method Serve[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ServeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Serve::class);
    }

//    /**
//     * @return Serve[] Returns an array of Serve objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Serve
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
