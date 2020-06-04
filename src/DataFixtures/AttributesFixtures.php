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
                'options' => ['years' => range((new \DateTime('-100 years'))->format('Y'), (new \DateTime())->format('Y'))],
            ],
            [
                'name' => 'address',
                'type' => 'string',
            ],
            [
                'name' => 'client',
                'type' => 'boolean',
            ],
            [
                'name' => 'gender',
                'type' => 'choice',
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