<?php
declare(strict_types=1);
/**
 *
 */

namespace App\Repository\Dictionary\EAV;

use App\Entity\Dictionary\EAV\EavValue;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EavValue|null find($id, $lockMode = null, $lockVersion = null)
 * @method EavValue|null findOneBy(array $criteria, array $orderBy = null)
 * @method EavValue[]    findAll()
 * @method EavValue[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EavValueRepository extends ServiceEntityRepository
{
    /**
     * EavValueRepository constructor.
     *
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EavValue::class);
    }
}
