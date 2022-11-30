<?php

namespace App\Repository;

use App\Entity\Wine;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\User;

/**
 * @extends ServiceEntityRepository<Wine>
 *
 * @method Wine|null find($id, $lockMode = null, $lockVersion = null)
 * @method Wine|null findOneBy(array $criteria, array $orderBy = null)
 * @method Wine[]    findAll()
 * @method Wine[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WineRepository extends ServiceEntityRepository
{
    public const TABLE = 'wine';

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Wine::class);
    }

    public function save(Wine $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Wine $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findLikeDomaine(string $domaine, User $user): array
    {
        $queryBuilder = $this->createQueryBuilder('w')
        ->where(':user MEMBER OF w.user')
        ->setParameters(['user' => $user])
        ->andWhere('w.domaine LIKE :name')
        ->setParameter('name', '%' . $domaine . '%');


        return $queryBuilder->getQuery()->getResult();
    }

    public function filterWines(array $filters, User $user): array
    {
            $qb = $this->createQueryBuilder('w')->where(':user MEMBER OF w.user')
                ->setParameters(['user' => $user]);
        if (!empty($filters['country'])) {
            $qb->andWhere('w.country = :country')->setParameter('country', $filters['country']);
        }
        if (!empty($filters['color'])) {
            $qb->andWhere('w.color = :color')->setParameter('color', $filters['color']);
        }

            return $qb->getQuery()->getResult();
    }

    public function findCellar(User $user): array
    {
        $qb = $this->createQueryBuilder('w')
        ->where(':user MEMBER OF w.user')
        ->setParameters(['user' => $user]);
        return $qb->getQuery()->getResult();
    }

    public function sumValue(User $user): int
    {

        $queryBuilder = $this-> createQueryBuilder('w')
         ->where(':user MEMBER OF w.user')
         ->setParameters(['user' => $user])
         ->select('SUM(w.value) AS total') ;



        return $queryBuilder->getQuery()->getSingleScalarResult();
        ;
    }

    public function bottleNumber(User $user): int
    {

        $queryBuilder = $this-> createQueryBuilder('w')
         ->where(':user MEMBER OF w.user')
         ->setParameters(['user' => $user])
         ->select('SUM(w.stock) AS total') ;



        return $queryBuilder->getQuery()->getSingleScalarResult();
        ;
    }



//    /**
//     * @return Wine[] Returns an array of Wine objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('w')
//            ->andWhere('w.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('w.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Wine
//    {
//        return $this->createQueryBuilder('w')
//            ->andWhere('w.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
