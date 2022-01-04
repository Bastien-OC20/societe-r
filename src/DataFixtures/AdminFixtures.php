<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\PasswordHasherFactoryInterface;

class AdminFixtures extends Fixture
{
    public function __construct(private PasswordHasherFactoryInterface $hasherFactory)
    {

    }
    public function load(ObjectManager $manager): void
    {
        $admin1 = new User();
        $admin1->setRoles(['ROLE_ADMIN']);
        $admin1->setEmail('admin@gmail.com');
        $admin1->setEnable('true');
        $admin1->setPassword($this->hasherFactory->getPasswordHasher(User::class)->hash('admin', null));

        $manager->persist($admin1);

        $manager->flush();
    }
}
