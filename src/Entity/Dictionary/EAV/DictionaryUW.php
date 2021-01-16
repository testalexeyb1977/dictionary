<?php
declare(strict_types=1);
/**
 *
 */

namespace App\Entity\Dictionary\EAV;

use App\Repository\Dictionary\EAV\EntityRepository;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Cправочник UW.
 *
 * @ORM\Entity()
 */
class DictionaryUW extends Dictionary
{

}
