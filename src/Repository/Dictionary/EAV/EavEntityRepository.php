<?php
declare(strict_types=1);
/**
 *
 */

namespace App\Repository\Dictionary\EAV;

use App\Entity\Dictionary\EAV\EavEntity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EavEntity|null find($id, $lockMode = null, $lockVersion = null)
 * @method EavEntity|null findOneBy(array $criteria, array $orderBy = null)
 * @method EavEntity[]    findAll()
 * @method EavEntity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EavEntityRepository extends ServiceEntityRepository
{
    /**
     * EavEntityRepository constructor.
     *
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EavEntity::class);
    }

}
