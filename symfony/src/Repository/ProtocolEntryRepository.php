<?php

namespace App\Repository;

use App\Entity\ProtocolEntry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ProtocolEntry|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProtocolEntry|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProtocolEntry[]    findAll()
 * @method ProtocolEntry[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProtocolEntryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProtocolEntry::class);
    }

    // /**
    //  * @return ProtocolEntry[] Returns an array of ProtocolEntry objects
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
    public function findOneBySomeField($value): ?ProtocolEntry
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
