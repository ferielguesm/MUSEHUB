<?php
namespace App\Repository;

use App\Entity\Post;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Post>
 *
 * @method Post|null find($id, $lockMode = null, $lockVersion = null)
 * @method Post|null findOneBy(array $criteria, array $orderBy = null)
 * @method Post[]    findAll()
 * @method Post[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PostRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Post::class);
    }

    // Tu peux ajouter ici des méthodes personnalisées, par ex :

    /*
    public function findRecent(int $limit = 10): array
    {
        return $this->createQueryBuilder('p')
            ->orderBy('p.createdAt', 'DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }
    */

    public function findWithComments(): array
    {
        return $this->createQueryBuilder('p')
            ->leftJoin('p.comments', 'c')
            ->addSelect('c')
            ->orderBy('p.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findWithFilters(?string $categoryId, string $sort = 'recent', int $limit = 20): array
    {
        $qb = $this->createQueryBuilder('p')
            ->leftJoin('p.comments', 'c')
            ->leftJoin('p.category', 'cat')
            ->addSelect('c')
            ->addSelect('cat');

        if ($categoryId) {
            $qb->andWhere('cat.id = :categoryId')
               ->setParameter('categoryId', $categoryId);
        }

        switch ($sort) {
            case 'liked':
                $qb->orderBy('p.likesCount', 'DESC')
                   ->addOrderBy('p.createdAt', 'DESC');
                break;
            case 'commented':
                // Use a subquery to get comment count without GROUP BY issues
                $subQuery = $this->_em->createQueryBuilder()
                    ->select('COUNT(c2.id)')
                    ->from('App\Entity\Comment', 'c2')
                    ->where('c2.post = p.id');

                $qb->addSelect(sprintf('(%s) as HIDDEN commentCount', $subQuery->getDQL()))
                   ->orderBy('commentCount', 'DESC')
                   ->addOrderBy('p.createdAt', 'DESC');
                break;
            case 'recent':
            default:
                $qb->orderBy('p.createdAt', 'DESC');
                break;
        }

        return $qb->setMaxResults($limit)
                  ->getQuery()
                  ->getResult();
    }
}
