<?php

namespace App\DataFixtures;

use App\Factory\UserFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    /** @required */
    public UserFactory $userFactory;

    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $user = $this->userFactory->create('admin@example.com', 'admin123');
        $manager->persist($user);

        $manager->flush();
    }
}
