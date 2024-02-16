<?php

namespace App\Repository;

use App\Entity\Picturecar;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Picturecar>
 *
 * @method Picturecar|null find($id, $lockMode = null, $lockVersion = null)
 * @method Picturecar|null findOneBy(array $criteria, array $orderBy = null)
 * @method Picturecar[]    findAll()
 * @method Picturecar[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PicturecarRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Picturecar::class);
    }

//    /**
//     * @return Picturecar[] Returns an array of Picturecar objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Picturecar
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
