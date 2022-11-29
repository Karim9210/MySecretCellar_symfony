<?php

namespace App\Repository;

use App\Entity\Wine;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

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


    // public function Stock()
    // {

    //     $query = "SELECT sum(stock) FROM " . self::TABLE ;

    //     return $this->query($query)->fetchAll();
    // }

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

    public function filterWines(array $filters, int $id): array|int|object
    {

        $conn = $this->getEntityManager()->getConnection();

        $queryFilter = 'SELECT * FROM wine w';
        $queryParams = '';
        foreach ($filters as $filter => $value) {
            if (!empty($value)) {
                if (empty($queryParams)) {
                    $queryParams .= 'w.' . $filter . '_id=' . $value;
                } else {
                    $queryParams .= ' AND ' . 'w.' . $filter . '_id=' . $value;
                }
            }
        }

        if (!empty($queryParams)) {
            $queryFilter .= " JOIN wine_user on wine_user.wine_id = w.id 
            JOIN user on wine_user.user_id = user.id 
            WHERE user.id = " . $id . " AND " . $queryParams;
        }
        dump($queryFilter);

        $stmt = $conn->prepare($queryFilter);
        $resultSet = $stmt->executeQuery();

        // returns an array of arrays (i.e. a raw data set)
        return $resultSet->fetchAllAssociative();
    }
}
