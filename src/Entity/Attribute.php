<?php

namespace App\Entity;

use App\Repository\AttributeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AttributeRepository::class)
 */
class Attribute
{
    const STRING = 'string';
    const NUMBER = 'number';
    const DATE = 'date';
    const BOOLEAN = 'boolean';
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $name;

    /**
     * @ORM\Column(type="string", length=80)
     */
    private string $type;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private bool $mandatory = true;

    /**
     * @ORM\Column(type="json")
     */
    private array $options = [];

    /**
     * @ORM\OneToMany(targetEntity=CustomerAttributes::class, mappedBy="attribute")
     */
    private iterable $customers;

    public function __construct()
    {
        $this->customers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getMandatory(): ?bool
    {
        return $this->mandatory;
    }

    public function setMandatory(?bool $mandatory): self
    {
        $this->mandatory = $mandatory;

        return $this;
    }

    public function getOptions(): ?array
    {
        return $this->options;
    }

    public function setOptions(array $options): self
    {
        $this->options = $options;

        return $this;
    }

    /**
     * @return Collection|CustomerAttributes[]
     */
    public function getCustomers(): Collection
    {
        return $this->customers;
    }

    public function addCustomer(CustomerAttributes $customer): self
    {
        if (!$this->customers->contains($customer)) {
            $this->customers[] = $customer;
            $customer->setAttribute($this);
        }

        return $this;
    }

    public function removeCustomer(CustomerAttributes $customer): self
    {
        if ($this->customers->contains($customer)) {
            $this->customers->removeElement($customer);
            // set the owning side to null (unless already changed)
            if ($customer->getAttribute() === $this) {
                $customer->setAttribute(null);
            }
        }

        return $this;
    }
}
