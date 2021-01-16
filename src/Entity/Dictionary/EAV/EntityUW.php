<?php
declare(strict_types=1);
/**
 *
 */

namespace App\Entity\Dictionary\EAV;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Запись справочника.
 *
 * @ORM\Entity()
 */
class EntityUW extends Entity
{
    /**
     * Cвязь между записями хранится только в записи справочника UW.
     * @var Collection
     *
     * @ORM\ManyToMany(targetEntity="Entity")
     * @ORM\JoinTable(name="eav_row_entity",
     *      joinColumns={@ORM\JoinColumn(name="entity_from_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="entity_to_id", referencedColumnName="id")}
     *      )
     */
    private Collection $mapping;

    /**
     * Значения записи как сейчас в админке
     * @ORM\Column(type="string", length=255)
     */
    private string $value;

    /**
     * UW ID как сейчас в админке.
     * @ORM\Column(type="integer", length=255)
     */
    private string $uwId;


    public function __construct(string $name, Dictionary $dictionary)
    {
        parent::__construct($name, $dictionary);
        $this->mapping = new ArrayCollection();
    }

    /**
     * @return Collection
     */
    public function getMapping(): Collection
    {
        return $this->mapping;
    }

    /**
     * Добавление маппинга.
     *
     * @param Entity $entity
     * @return Collection $entity
     */
    public function addMapping(Entity $entity): Collection
    {
        if (!$this->mapping->contains($entity)) {
            $this->mapping->add($entity);
        }

        return $this->mapping;
    }

    /**
     * Удаление маппинга.
     *
     * @param Entity $entity
     * @return Collection $entity
     */
    public function removeMapping(Entity $entity): Collection
    {
        if ($this->mapping->contains($entity)) {
            $this->mapping->removeElement($entity);
        }

        return $this->mapping;
    }

    /**
     * @param Collection $mapping
     */
    public function setMapping(Collection $mapping): void
    {
        $this->mapping = $mapping;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     * @return EntityUW
     */
    public function setValue(string $value): EntityUW
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getUwId(): string
    {
        return $this->uwId;
    }

    /**
     * @param string $uwId
     * @return EntityUW
     */
    public function setUwId(string $uwId): EntityUW
    {
        $this->uwId = $uwId;
        return $this;
    }
}
