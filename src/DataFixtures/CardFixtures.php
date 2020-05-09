<?php

namespace App\DataFixtures;

use App\Entity\Carte;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CardFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i <= 16; $i++) {
            $card = new Carte();

            $card->setNom($i);
            $card->setDescription($i);
            $card->setFichier($i . '.png');

            $manager->persist($card);
            $manager->flush();
        }
    }
}
