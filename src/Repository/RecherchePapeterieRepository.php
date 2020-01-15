<?php

namespace App\Repository;

use App\Entity\RecherchePapeterie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method RecherchePapeterie|null find($id, $lockMode = null, $lockVersion = null)
 * @method RecherchePapeterie|null findOneBy(array $criteria, array $orderBy = null)
 * @method RecherchePapeterie[]    findAll()
 * @method RecherchePapeterie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RecherchePapeterieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RecherchePapeterie::class);
    }

    // /**
    //  * @return RecherchePapeterie[] Returns an array of RecherchePapeterie objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RecherchePapeterie
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
