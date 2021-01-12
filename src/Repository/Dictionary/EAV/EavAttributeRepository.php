<?php
declare(strict_types=1);
/**
 *
 */

namespace App\Repository\Dictionary\EAV;

use App\Entity\Dictionary\EAV\EavAttribute;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EavAttribute|null find($id, $lockMode = null, $lockVersion = null)
 * @method EavAttribute|null findOneBy(array $criteria, array $orderBy = null)
 * @method EavAttribute[]    findAll()
 * @method EavAttribute[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EavAttributeRepository extends ServiceEntityRepository
{
    /**
     * EavAttributeRepository constructor.
     *
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EavAttribute::class);
    }

}
