<?php

namespace App\Repository;

use App\Entity\FamousQuote;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method FamousQuote|null find($id, $lockMode = null, $lockVersion = null)
 * @method FamousQuote|null findOneBy(array $criteria, array $orderBy = null)
 * @method FamousQuote[]    findAll()
 * @method FamousQuote[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FamousQuoteRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, FamousQuote::class);
    }

    // /**
    //  * @return FamousQuote[] Returns an array of FamousQuote objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FamousQuote
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
