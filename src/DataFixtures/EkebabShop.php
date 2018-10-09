<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Kebab;

class EkebabShop extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $kebab = new Kebab();
        $kebab->setTaille('M');
        $kebab->setViande('Escalope');
        $kebab->setSauce('Blanche');
        $kebab->setLegumes('Salade');
        $kebab->setPrix('5');

        $manager->persist($kebab);

        $kebab = new Kebab();
        $kebab->setTaille('XL');
        $kebab->setViande('Kebab');
        $kebab->setSauce('Mayonnaise');
        $kebab->setLegumes('Tomate');
        $kebab->setPrix('8.5');

        $manager->persist($kebab);

        $manager->flush();
    }
}
