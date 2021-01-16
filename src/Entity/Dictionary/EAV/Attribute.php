<?php
declare(strict_types=1);
/**
 *
 */

namespace App\Entity\Dictionary\EAV;

use App\Repository\Dictionary\EAV\AttributeRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @UniqueEntity(fields={"name", "entity"})
 *
 * @ORM\Entity(repositoryClass=AttributeRepository::class)
 * @ORM\Table(name="eav_attribute", uniqueConstraints={@UniqueConstraint(name="pk_eav_attribute",columns={"name", "dictionary_id"})})
 */
class Attribute
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
     * @todo: Для этого нужно сделать собственный тип в доктрине.
     * Тип должен строго определять возможные значения для этого поля. Аля ENUM.
     * Типы определять константами. Какие типы могут понадобиться:
     * - текст
     * - число
     * - Ссылка на справочник
     *
     * У типов могут быть настройки. К примеру у строки может быть длина строки, или максимальное число.
     * Для ссылка на справочник должен указываться какой конкретно справочник.
     *
     * @ORM\Column(type="string", length=255)
     */
    private string $type = 'string';

    /**
     * @ORM\Column(type="boolean")
     */
    private bool $isUnique = false;

    /**
     * @ORM\Column(type="array")
     */
    private array $constraints = [];

    /**
     * @var Dictionary
     *
     * @ORM\ManyToOne(targetEntity="Dictionary", inversedBy="attributes")
     * @ORM\JoinColumn(name="dictionary_id", referencedColumnName="id", nullable=false)
     */
    private Dictionary $dictionary;

    public function __construct(string $name, Dictionary $dictionary)
    {
        $this->name = $name;
        $this->dictionary = $dictionary;
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
     * @return Attribute
     */
    public function setName(string $name): Attribute
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return Attribute
     */
    public function setType(string $type): Attribute
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return bool
     */
    public function isUnique(): bool
    {
        return $this->isUnique;
    }

    /**
     * @param bool $isUnique
     * @return Attribute
     */
    public function setIsUnique(bool $isUnique): Attribute
    {
        $this->isUnique = $isUnique;
        return $this;
    }

    /**
     * @return array
     */
    public function getConstraints(): array
    {
        return $this->constraints;
    }

    /**
     * @param array $constraints
     * @return Attribute
     */
    public function setConstraints(array $constraints): Attribute
    {
        $this->constraints = $constraints;
        return $this;
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
     * @return Attribute
     */
    public function setDictionary(Dictionary $dictionary): Attribute
    {
        $this->dictionary = $dictionary;
        return $this;
    }
}
