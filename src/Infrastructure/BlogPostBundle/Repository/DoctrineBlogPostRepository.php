<?php

declare(strict_types=1);

namespace App\Infrastructure\BlogPostBundle\Repository;

use App\Domain\BlogPost\Model\BlogPost;
use App\Domain\User\Repository\BlogPostRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\ORM\NonUniqueResultException;

/**
 * @method BlogPost|null find($id, $lockMode = null, $lockVersion = null)
 * @method BlogPost|null findOneBy(array $criteria, array $orderBy = null)
 * @method BlogPost[]    findAll()
 * @method BlogPost[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DoctrineBlogPostRepository extends ServiceEntityRepository implements BlogPostRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, BlogPost::class);
    }



    // /**
    //  * @return BlogPost[] Returns an array of BlogPost objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?BlogPost
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    public function getAll(): array
    {
        // TODO: Implement getAll() method.
    }

    public function save(BlogPost $blogPost)
    {
        // TODO: Implement save() method.
    }


    /**
     * @param string $slug
     * @return BlogPost
     * @throws NonUniqueResultException
     */
    public function findBlogPostBySlug(string $slug): BlogPost
    {
        return $this->createQueryBuilder('b')
            ->innerJoin('b.user', 'u')
            ->addSelect('u')
            ->andWhere('b.slug = :slug')
            ->setParameter('slug', $slug)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
