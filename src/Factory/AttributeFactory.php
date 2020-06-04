<?php


namespace App\Factory;


use App\Entity\Attribute;

class AttributeFactory
{
    public function create(string $name, string $type, bool $isMandatory = true, array $options = []): Attribute
    {
        return (new Attribute())
            ->setName($name)
            ->setType($type)
            ->setMandatory($isMandatory)
            ->setOptions($options);
    }
}