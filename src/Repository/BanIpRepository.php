<?php

namespace App\Repository;

use App\Entity\BanIp;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BanIp|null find($id, $lockMode = null, $lockVersion = null)
 * @method BanIp|null findOneBy(array $criteria, array $orderBy = null)
 * @method BanIp[]    findAll()
 * @method BanIp[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BanIpRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BanIp::class);
    }

    // /**
    //  * @return BanIp[] Returns an array of BanIp objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?BanIp
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
