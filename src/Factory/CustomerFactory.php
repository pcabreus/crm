<?php


namespace App\Factory;


use App\Entity\Attribute;
use App\Entity\Customer;
use App\Entity\CustomerAttributes;
use App\Repository\AttributeRepository;

class CustomerFactory
{
    private AttributeRepository $attributeRepository;

    public function __construct(AttributeRepository $attributeRepository)
    {
        $this->attributeRepository = $attributeRepository;
    }

    public function create(): Customer
    {
        $customer = new Customer();
        $attributes = $this->attributeRepository->findAll();
        foreach ($attributes as $attribute) {
            $customer->addAttribute($this->createCustomerAttribute($attribute));
        }

        return $customer;
    }

    public function createCustomerAttribute(Attribute $attribute): CustomerAttributes
    {
        return (new CustomerAttributes())->setAttribute($attribute);
    }
}