<?php

namespace App\Repository;

use App\Entity\Competences1;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Competences1|null find($id, $lockMode = null, $lockVersion = null)
 * @method Competences1|null findOneBy(array $criteria, array $orderBy = null)
 * @method Competences1[]    findAll()
 * @method Competences1[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class Competences1Repository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Competences1::class);
    }

    // /**
    //  * @return Competences1[] Returns an array of Competences1 objects
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
    public function findOneBySomeField($value): ?Competences1
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
