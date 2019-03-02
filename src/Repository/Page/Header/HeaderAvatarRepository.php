<?php

namespace App\Repository\Page\Header;

use App\Entity\Page\Header\HeaderAvatar;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method HeaderAvatar|null find($id, $lockMode = null, $lockVersion = null)
 * @method HeaderAvatar|null findOneBy(array $criteria, array $orderBy = null)
 * @method HeaderAvatar[]    findAll()
 * @method HeaderAvatar[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HeaderAvatarRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, HeaderAvatar::class);
    }

    // /**
    //  * @return HeaderAvatar[] Returns an array of HeaderAvatar objects
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
    public function findOneBySomeField($value): ?HeaderAvatar
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
