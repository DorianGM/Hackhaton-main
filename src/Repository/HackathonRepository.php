<?php

namespace App\Repository;

use App\Entity\Hackathon;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Validator\Constraints\All;

/**
 * @method Hackathon|null find($id, $lockMode = null, $lockVersion = null)
 * @method Hackathon|null findOneBy(array $criteria, array $orderBy = null)
 * @method Hackathon[]    findAll()
 * @method Hackathon[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HackathonRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Hackathon::class);
    }

    // /**
    //  * @return Hackathon[] Returns an array of Hackathon objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Hackathon
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function parVille(){
        return $this->createQueryBuilder('h')
        ->select('DISTINCT h.ville')
        ->orderBy('h.ville', 'ASC')
        ->getQuery()
        
        ->getResult()
    ;
}

    public function parNbPlaces(){
        return $this->createQueryBuilder('h')
        ->orderBy('h.nbplaces', 'DESC')
        ->getQuery()
        ->getResult()
    ;
}

    public function parVille2($ville){
        return $this->createQueryBuilder('h')
        ->andWhere('h.ville = :ville')
        ->setParameter('ville', $ville)
        ->orderBy('h.ville', 'ASC')
        ->getQuery()
    
        ->getResult()
    ;
 }

    // public function parType(){
    //     return $this->createQueryBuilder('h')
    //     ->andWhere('h.type = initiation')
    //     ->orderBy('h.type', 'ASC')
    //     ->getQuery()
    
    //     ->getResult()
    // ;
    // }

}
