<?php

namespace App\Repository\Page\Article;

use App\Entity\Page\Article\Article;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\DBAL\Types\Type;

/**
 * @method Article|null find($id, $lockMode = null, $lockVersion = null)
 * @method Article|null findOneBy(array $criteria, array $orderBy = null)
 * @method Article[]    findAll()
 * @method Article[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticleRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Article::class);
    }

    public function findPublished()
    {
        return $this->createQueryBuilder('a')
            ->where('a.publishAt <= :currentDate')
            ->orderBy('a.publishAt', 'DESC')
            ->setParameter('currentDate', new \DateTime(), Type::DATETIME)
            ->getQuery()
            ->getResult();
    }
}
