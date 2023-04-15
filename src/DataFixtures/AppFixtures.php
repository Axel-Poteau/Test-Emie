<?php

namespace App\DataFixtures;

use App\Entity\Mot;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $mot = new Mot;
        $mot->setMot('kayak');
        $mot->setMotReverse('kayak');
        $mot->setPalindrome(true);
        $manager->persist($mot);
        $manager->flush();
    }
}
