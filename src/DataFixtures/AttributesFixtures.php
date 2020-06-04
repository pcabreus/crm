<?php


namespace App\DataFixtures;


use App\Factory\AttributeFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AttributesFixtures extends Fixture
{
    /** @required */
    public AttributeFactory $factory;

    public function load(ObjectManager $manager)
    {
        $defaultAttributes = [
            [
                'name' => 'birthday',
                'type' => 'date',
            ],
            [
                'name' => 'email',
                'type' => 'string',
            ],
            [
                'name' => 'gender',
                'type' => 'string',
                'options' => ['choices' => ['male' => 'Male', 'female' => 'Female']],
            ],
        ];

        foreach ($defaultAttributes as $defaultAttribute) {
            $attribute = $this->factory->create(
                $defaultAttribute['name'],
                $defaultAttribute['type'],
                true,
                $defaultAttribute['options'] ?? []
            );

            $manager->persist($attribute);
        }

        $manager->flush();
    }

}