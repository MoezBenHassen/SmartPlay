<?php

namespace App\Repository;

use App\Entity\Jouet;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use mysql_xdevapi\Result;

/**
 * @method Jouet|null find($id, $lockMode = null, $lockVersion = null)
 * @method Jouet|null findOneBy(array $criteria, array $orderBy = null)
 * @method Jouet[]    findAll()
 * @method Jouet[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JouetRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Jouet::class);
    }
    public function findMaxQty()
    {
//Methode createQueryBuilder
        $queryBuilder = $this->_em->createQueryBuilder()
            ->select('a.id','max(a.qte_stock_jouet)')
            ->from($this->_entityName, 'a');
        $query = $queryBuilder->getQuery();
        $results = $query->getResult();
//Methode createQuery
//        $em = $this->getEntityManager();
//        $queryBuilder = $em->createQuery('SELECT j.id, max( j.qte_stock_jouet ) FROM App\Entity\Jouet j');
//
//        $results = $queryBuilder->getResult();

        return $results;
    }

    public function findMinPrice(){
        $queryBuilder = $this->_em->createQueryBuilder()
            ->select('a.id','min(a.PU_jouet)')
            ->from($this->_entityName, 'a');
        $query = $queryBuilder->getQuery();
        $results = $query->getResult();
        return $results;
    }


    public function fMax (){
        $countQte= $this->_em->createQueryBuilder()
            ->select('count(j.qte_stock_jouet)')
            ->from($this->_entityName, 'j')
            ->groupBy('j.code_four_jouet');
        $queryBuilder = $this->_em->createQueryBuilder()
            ->select('max(q.qte_stock_jouet)')
            ->from($countQte,'q');

        $query = $queryBuilder->getQuery();
        $results = $query->getResult();
        return $results;

//        $em = $this->getEntityManager();
//        $queryBuilder = $em->createQuery('SELECT jjj.code_four_jouet, MAX(jj.qte_stock_jouet) FROM (SELECT count(j.qte_stock_jouet) FROM App\Entity\Jouet j group by code_four) jj ');


    }
    // /**
    //  * @return Jouet[] Returns an array of Jouet objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('j.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Jouet
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
