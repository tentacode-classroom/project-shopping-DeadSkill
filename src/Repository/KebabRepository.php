<?php

namespace App\Repository;

use App\Entity\Kebab;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Kebab|null find($id, $lockMode = null, $lockVersion = null)
 * @method Kebab|null findOneBy(array $criteria, array $orderBy = null)
 * @method Kebab[]    findAll()
 * @method Kebab[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KebabRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Kebab::class);
    }
    
    public function findAllOrderByPrice() {
        $qbtest = $this->createQueryBuilder('p')
                       ->orderBy('p.prix','DESC');
        
        return $qbtest->getQuery()->execute();
    }

//    /**
//     * @return Kebab[] Returns an array of Kebab objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('k.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Kebab
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

}
