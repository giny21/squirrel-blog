<?php

namespace App\Repository\Page\Header;

use App\Entity\Page\Header\Header;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Header|null find($id, $lockMode = null, $lockVersion = null)
 * @method Header|null findOneBy(array $criteria, array $orderBy = null)
 * @method Header[]    findAll()
 * @method Header[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HeaderRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Header::class);
    }

    public function findEnabled()
    {
        return $this->createQueryBuilder('h')
            ->where('h.enabled = 1')
            ->orderBy('h.id', 'DESC')
            ->setMaxResults(1)
            ->getQuery()
            ->getSingleResult();
    }
}
