<?php
declare(strict_types=1);
/**
 *
 */

namespace App\Entity\Dictionary\EAV;

use App\Repository\Dictionary\EAV\EavEntityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EavEntityRepository::class)
 */
class EavEntity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer")
     */
    private ?int $id = null;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private string $name;

    /**
     * @ORM\Column(type="string", length=512)
     */
    private string $description;

    /**
     * @ORM\Column(type="array")
     */
    private array $compositeUniqueKeys = [];

    /**
     * @ORM\Column(type="integer")
     */
    private int $fieldsCount = 1;


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

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCompositeUniqueKeys(): array
    {
        return $this->compositeUniqueKeys;
    }

    public function setCompositeUniqueKeys(array $compositeUniqueKeys): self
    {
        $this->compositeUniqueKeys = $compositeUniqueKeys;

        return $this;
    }

    public function getFieldsCount(): int
    {
        return $this->fieldsCount;
    }

    public function setFieldsCount(int $fieldsCount): self
    {
        $this->fieldsCount = $fieldsCount;

        return $this;
    }
}
