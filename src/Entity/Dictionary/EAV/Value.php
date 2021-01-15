<?php
declare(strict_types=1);
/**
 *
 */

namespace App\Entity\Dictionary\EAV;

use App\Repository\Dictionary\EAV\ValueRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;
use InvalidArgumentException;

/**
 * Значение аттрибута у конкретной entity.
 *
 * @ORM\Entity(repositoryClass=ValueRepository::class)
 * @ORM\Table(name="eav_value", uniqueConstraints={@UniqueConstraint(name="uniq_attribute_value",columns={"entity_id", "attribute_id"})})
 */
class Value
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer")
     */
    private ?int $id;

    /**
     * @var Entity
     *
     * @ORM\ManyToOne(targetEntity="Entity")
     * @ORM\JoinColumn(name="entity_id", referencedColumnName="id", nullable=false)
     */
    private Entity $entity;

    /**
     * @var Attribute
     *
     * @ORM\ManyToOne(targetEntity="Attribute")
     * @ORM\JoinColumn(name="attribute_id", referencedColumnName="id", nullable=false)
     */
    private Attribute $attribute;

    /**
     * @todo: Тип определяю как text, потому что не понятно какие значения какого типа и какой длины будут записываться.
     * @ORM\Column(type="text")
     */
    private string $value;

    /**
     * Value constructor.
     * @param Entity $entity
     * @param Attribute $attribute
     * @param string $value
     */
    public function __construct(Entity $entity, Attribute $attribute, string $value)
    {
        if ($entity->getDictionary() !== $attribute->getDictionary()) {
            throw new InvalidArgumentException('Невозможно добавить значения для атрибута из другого справочника');
        }

        $this->entity = $entity;
        $this->attribute = $attribute;
        $this->value = $value;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Entity
     */
    public function getEntity(): Entity
    {
        return $this->entity;
    }

    /**
     * @param Entity $entity
     * @return Value
     */
    public function setEntity(Entity $entity): Value
    {
        $this->entity = $entity;
        return $this;
    }

    /**
     * @return Attribute
     */
    public function getAttribute(): Attribute
    {
        return $this->attribute;
    }

    /**
     * @param Attribute $attribute
     * @return Value
     */
    public function setAttribute(Attribute $attribute): Value
    {
        $this->attribute = $attribute;
        return $this;
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
     * @return Value
     */
    public function setValue(string $value): Value
    {
        $this->value = $value;
        return $this;
    }
}
