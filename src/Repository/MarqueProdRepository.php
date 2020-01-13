<?php

namespace App\Repository;

use App\Entity\MarqueProd;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method MarqueProd|null find($id, $lockMode = null, $lockVersion = null)
 * @method MarqueProd|null findOneBy(array $criteria, array $orderBy = null)
 * @method MarqueProd[]    findAll()
 * @method MarqueProd[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MarqueProdRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MarqueProd::class);
    }

    // /**
    //  * @return MarqueProd[] Returns an array of MarqueProd objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MarqueProd
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
