<?php
declare(strict_types=1);
/**
 *
 */

namespace App\Entity\Dictionary\EAV;

use App\Repository\Dictionary\EAV\EavValueRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EavValueRepository::class)
 */
class EavValue
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer")
     */
    private ?int $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $value;

    /**
     * @var EavAttribute
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Dictionary\EAV\EavAttribute")
     * @ORM\JoinColumn(name="attribute_id", referencedColumnName="id", nullable=false)
     */
    private EavAttribute $attribute;

    /**
     * @var EavRow
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Dictionary\EAV\EavRow")
     * @ORM\JoinColumn(name="row_id", referencedColumnName="id", nullable=false)
     */
    private EavRow $row;

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
    public function getValue(): ?string
    {
        return $this->value;
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setValue(string $value): self
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @return EavAttribute
     */
    public function getAttribute(): EavAttribute
    {
        return $this->attribute;
    }

    /**
     * @param EavAttribute $attribute
     *
     * @return $this
     */
    public function setAttribute(EavAttribute $attribute): self
    {
        $this->attribute = $attribute;

        return $this;
    }

    /**
     * @return EavRow
     */
    public function getRow(): EavRow
    {
        return $this->row;
    }

    /**
     * @param EavRow $row
     */
    public function setRow(EavRow $row): void
    {
        $this->row = $row;
    }

}
