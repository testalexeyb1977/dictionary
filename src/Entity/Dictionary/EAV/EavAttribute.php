<?php
declare(strict_types=1);
/**
 *
 */

namespace App\Entity\Dictionary\EAV;

use App\Repository\Dictionary\EAV\EavAttributeRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @UniqueEntity(fields={"name", "entity"})
 *
 * @ORM\Entity(repositoryClass=EavAttributeRepository::class)
 * @ORM\Table(uniqueConstraints={@UniqueConstraint(name="pk_eav_attribute",columns={"name", "entity_id"})})
 */
class EavAttribute
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer")
     */
    private ?int $id = null;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $type;

    /**
     * @ORM\Column(type="boolean")
     */
    private bool $isUnique = false;

    /**
     * @ORM\Column(type="array")
     */
    private array $constraints = [];

    /**
     * @var EavEntity
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Dictionary\EAV\EavEntity")
     * @ORM\JoinColumn(name="entity_id", referencedColumnName="id", nullable=false)
     */
    private EavEntity $entity;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return $this
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string $type
     *
     * @return $this
     */
    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsUnique(): ?bool
    {
        return $this->isUnique;
    }

    /**
     * @param bool $isUnique
     *
     * @return $this
     */
    public function setIsUnique(bool $isUnique): self
    {
        $this->isUnique = $isUnique;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getConstraints(): ?array
    {
        return $this->constraints;
    }

    /**
     * @param array $constraints
     *
     * @return $this
     */
    public function setConstraints(array $constraints): self
    {
        $this->constraints = $constraints;

        return $this;
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
}
