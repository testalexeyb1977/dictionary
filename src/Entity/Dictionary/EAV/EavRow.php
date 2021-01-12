<?php
declare(strict_types=1);
/**
 *
 */

namespace App\Entity\Dictionary\EAV;

use App\Repository\Dictionary\EAV\EavRowRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EavRowRepository::class)
 */
class EavRow
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private ?int $id;

    /**
     * @ORM\ManyToOne(targetEntity=EavEntity::class)
     * @ORM\JoinColumn(name="entity_id", nullable=false)
     */
    private EavEntity $entity;

    /**
     * @var Collection
     *
     * @ORM\ManyToMany(targetEntity="EavRow")
     * @ORM\JoinTable(name="eav_mapping",
     *      joinColumns={@ORM\JoinColumn(name="eav_row_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="eav_mapped_row_id", referencedColumnName="id")}
     *      )
     */
    private Collection $mapping;

    /**
     * EavRow constructor.
     */
    public function __construct()
    {
        $this->mapping = new ArrayCollection();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return EavEntity
     */
    public function getEntity(): EavEntity
    {
        return $this->entity;
    }

    /**
     * @param EavEntity $entity
     *
     * @return $this
     */
    public function setEntity(EavEntity $entity): self
    {
        $this->entity = $entity;

        return $this;
    }

    /**
     * @return Collection|EavRow[]
     */
    public function getMapping(): Collection
    {
        return $this->mapping;
    }

    /**
     * @param EavRow $mapping
     *
     * @return $this
     */
    public function addMapping(EavRow $mapping): self
    {
        if (!$this->mapping->contains($mapping)) {
            $this->mapping[] = $mapping;
        }

        return $this;
    }

    /**
     * @param EavRow $mapping
     *
     * @return $this
     */
    public function removeMapping(EavRow $mapping): self
    {
        $this->mapping->removeElement($mapping);

        return $this;
    }
}
