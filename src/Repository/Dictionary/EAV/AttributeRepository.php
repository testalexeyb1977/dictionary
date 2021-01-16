<?php
declare(strict_types=1);
/**
 *
 */

namespace App\Repository\Dictionary\EAV;

use App\Entity\Dictionary\EAV\Attribute;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Attribute|null find($id, $lockMode = null, $lockVersion = null)
 * @method Attribute|null findOneBy(array $criteria, array $orderBy = null)
 * @method Attribute[]    findAll()
 * @method Attribute[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AttributeRepository extends ServiceEntityRepository
{
    /**
     * AttributeRepository constructor.
     *
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Attribute::class);
    }

}
