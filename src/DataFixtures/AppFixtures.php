<?php

namespace App\DataFixtures;

use App\Entity\Profile;
use App\Entity\Trainee;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $profile1 = new Profile();
        $profile1->setName("Bob");
        $profile1->setSurname("Dylan");
        $profile1->setBirthday(new \DateTime("1994-10-06"));
        $profile1->setGender("male");
        $manager->persist($profile1);


        $trainee1 = new Trainee();
        $trainee1->setSchoolName("Harvard");
        $trainee1->setProfile($profile1);
        $manager->persist($trainee1);

        $profile2 = new Profile();
        $profile2->setName("Bobie");
        $profile2->setSurname("Dylanette");
        $profile2->setBirthday(new \DateTime("2002-10-06"));
        $profile2->setGender("female");
        $manager->persist($profile2);


        $trainee2 = new Trainee();
        $trainee2->setSchoolName("UCLA");
        $trainee2->setProfile($profile2);
        $manager->persist($trainee2);


        $manager->flush();
    }
}
