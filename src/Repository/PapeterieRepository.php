<?php

namespace App\Repository;

use Doctrine\ORM\Query;
use App\Entity\Papeterie;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method Papeterie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Papeterie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Papeterie[]    findAll()
 * @method Papeterie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PapeterieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Papeterie::class);
    }
    public function findPagination() : Query{
        return $this->createQueryBuilder('v')
                      ->getQuery();

             
    }

    // /**
    //  * @return Papeterie[] Returns an array of Papeterie objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Papeterie
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
