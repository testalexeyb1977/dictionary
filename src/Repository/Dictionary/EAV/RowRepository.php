<?php
declare(strict_types=1);
/**
 *
 */
namespace App\Repository\Dictionary\EAV;

use App\Entity\Dictionary\EAV\Row;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Row|null find($id, $lockMode = null, $lockVersion = null)
 * @method Row|null findOneBy(array $criteria, array $orderBy = null)
 * @method Row[]    findAll()
 * @method Row[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RowRepository extends ServiceEntityRepository
{
    /**
     * RowRepository constructor.
     *
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Row::class);
    }
}
