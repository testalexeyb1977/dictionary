<?php
declare(strict_types=1);
/**
 *
 */

namespace App\Entity\Dictionary\EAV;

use App\Repository\Dictionary\EAV\EntityRepository;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Запись справочника.
 *
 * @ORM\Entity(repositoryClass=EntityRepository::class)
 * @ORM\Table(name="eav_entity")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorMap({"uw" = "EntityUW", "partner" = "Entity"})
 */
class Entity
{
    /**
     * Идентификатор
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer")
     */
    private ?int $id = null;

    /**
     * Запись всегда принадлежит какому то справочнику.
     *
     * @var Dictionary
     * @ORM\ManyToOne(targetEntity="Dictionary", inversedBy="entities")
     * @ORM\JoinColumn(name="dictionery_id", referencedColumnName="id", nullable=false)
     */
    private Dictionary $dictionary;

    /**
     * Составной уникальный ключ записи
     * @ORM\Column(type="array")
     */
    private array $compositeUniqueKeys = [];

    /**
     * @var DateTime
     * @ORM\Column(type="datetime", nullable=false, options={"default": "CURRENT_TIMESTAMP"})
     */
    private DateTime $createdAt;

    /**
     * @var DateTime
     * @ORM\Column(type="datetime", nullable=false)
     */
    private DateTime $updatedAt;

    /**
     * Основной атрибут записи в справочнике. Может использоваться для сохранения значения без создания атрибута.
     * Например:
     * Для справочника "Образование", не нужны дополнительные аттрибуты. Поэтому Entity будут типа:
     * { name: 'Незаконченное высшее' }, { name: 'Высшее'}
     *
     * @ORM\Column(type="string", length=255)
     */
    private string $name;

    public function __construct(string $name, Dictionary $dictionary)
    {
        $this->createdAt = new DateTime();
        $this->updatedAt = new DateTime();
        $this->dictionary = $dictionary;
        $this->name = $name;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Dictionary
     */
    public function getDictionary(): Dictionary
    {
        return $this->dictionary;
    }

    /**
     * @param Dictionary $dictionary
     * @return Entity
     */
    public function setDictionary(Dictionary $dictionary): Entity
    {
        $this->dictionary = $dictionary;
        return $this;
    }

    /**
     * @return array
     */
    public function getCompositeUniqueKeys(): array
    {
        return $this->compositeUniqueKeys;
    }

    /**
     * @param array $compositeUniqueKeys
     * @return Entity
     */
    public function setCompositeUniqueKeys(array $compositeUniqueKeys): Entity
    {
        $this->compositeUniqueKeys = $compositeUniqueKeys;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param DateTime $createdAt
     * @return Entity
     */
    public function setCreatedAt(DateTime $createdAt): Entity
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getUpdatedAt(): DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @param DateTime $updatedAt
     * @return Entity
     */
    public function setUpdatedAt(DateTime $updatedAt): Entity
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Entity
     */
    public function setName(string $name): Entity
    {
        $this->name = $name;
        return $this;
    }
}
