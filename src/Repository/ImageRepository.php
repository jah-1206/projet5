<?php

namespace App\Repository;

use App\Entity\Image;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Image|null find($id, $lockMode = null, $lockVersion = null)
 * @method Image|null findOneBy(array $criteria, array $orderBy = null)
 * @method Image[]    findAll()
 * @method Image[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Image::class);
    }

    public function findAllImages()
    {
        return $this->createQueryBuilder('i')
        ->getQuery()
        ->getResult()
        ;
    }
    public function findAutomobileImages()
    {
        return $this->createQueryBuilder('i')
        ->andWhere('i.category <= :cat')
        ->setParameter('cat', 2)
        ->orderBy('i.id', 'DESC')
        ->getQuery()
        ->getResult()
        ;
    }

    public function findEventsImages()
    {
        return $this->createQueryBuilder('i')
        ->andWhere('i.category = :cat')
        ->setParameter('cat', 0)
        ->getQuery()
        ->getResult()
        ;
    }

    public function findShootingsImages()
    {
        return $this->createQueryBuilder('i')
        ->andWhere('i.category = :cat')
        ->setParameter('cat', 1)
        ->getQuery()
        ->getResult()
        ;
    }

    public function findDiversImages()
    {
        return $this->createQueryBuilder('i')
        ->andWhere('i.category = :cat')
        ->setParameter('cat', 2)
        ->getQuery()
        ->getResult()
        ;
    }

    public function findNatureImages()
    {
        return $this->createQueryBuilder('i')
        ->where('i.category = :cat')
        ->setParameter('cat', 3)
        ->orderBy('i.id', 'DESC')
        ->getQuery()
        ->getResult()
        ;
    }

    // /**
    //  * @return Image[] Returns an array of Image objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Image
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
