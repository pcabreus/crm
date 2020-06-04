<?php

namespace App\Entity;

use App\Repository\CustomerAttributesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CustomerAttributesRepository::class)
 */
class CustomerAttributes
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="text")
     */
    private $value = null;

    /**
     * @ORM\ManyToOne(targetEntity=Customer::class, inversedBy="attributes")
     */
    private Customer $customer;

    /**
     * @ORM\ManyToOne(targetEntity=Attribute::class, inversedBy="customers")
     */
    private Attribute $attribute;

    public function __toString()
    {
        return (string) $this->value;
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function setValue($value): self
    {
        if($value instanceof \DateTimeInterface) {
            $value = $value->getTimestamp();
        }

        $this->value = (string) $value;

        return $this;
    }

    public function getCustomer(): Customer
    {
        return $this->customer;
    }

    public function setCustomer(Customer $customer): self
    {
        $this->customer = $customer;

        return $this;
    }

    public function getAttribute(): Attribute
    {
        return $this->attribute;
    }

    public function setAttribute(Attribute $attribute): self
    {
        $this->attribute = $attribute;

        return $this;
    }
}
