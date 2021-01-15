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
 * Cправочник.
 *
 * @ORM\Entity(repositoryClass=DictionaryRepository::class)
 * @ORM\Table(name="eav_dictionary")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorMap({"uw" = "DictionaryUW", "partner" = "Dictionary"})
 */
class Dictionary
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
     * Название справочника
     * @ORM\Column(type="string", length=255, unique=false)
     */
    private string $name;

    /**
     * В справочнике есть атрибуты, которые могут заполнятся у entity.
     * @ORM\OneToMany(targetEntity="Attribute", mappedBy="dictionary", fetch="LAZY")
     */
    private Collection $attributes;

    /**
     * В одном справочнике может находится много Entity
     * @ORM\OneToMany(targetEntity="Entity", mappedBy="dictionary", fetch="EXTRA_LAZY")
     */
    private Collection $entities;

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

    public function __construct(string $name) {
        $this->createdAt = new DateTime();
        $this->updatedAt = new DateTime();
        $this->entities = new ArrayCollection();
        $this->attributes = new ArrayCollection();
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
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Dictionary
     */
    public function setName(string $name): Dictionary
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return ArrayCollection|Collection
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * @param ArrayCollection|Collection $attributes
     * @return Dictionary
     */
    public function setAttributes($attributes)
    {
        $this->attributes = $attributes;
        return $this;
    }

    /**
     * @return ArrayCollection|Collection
     */
    public function getEntities()
    {
        return $this->entities;
    }

    /**
     * @param ArrayCollection|Collection $entities
     * @return Dictionary
     */
    public function setEntities($entities)
    {
        $this->entities = $entities;
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
     * @return Dictionary
     */
    public function setCreatedAt(DateTime $createdAt): Dictionary
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
     * @return Dictionary
     */
    public function setUpdatedAt(DateTime $updatedAt): Dictionary
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

}
