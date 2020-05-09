<?php

namespace App\DataFixtures;

use App\Entity\Statut;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class StatutFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $statut = new Statut();
        $statut->setName('Dos');
        $statut->setDescription('Carte de dos');
        $manager->persist($statut);
        $manager->flush();
        $statut = new Statut();
        $statut->setName('Face');
        $statut->setDescription('Carte de face');
        $manager->persist($statut);
        $manager->flush();
        $statut = new Statut();
        $statut->setName('Trouver');
        $statut->setDescription('Carte trouvé');
        $manager->persist($statut);
        $manager->flush();
        $statut = new Statut();
        $statut->setName('HJ');
        $statut->setDescription('Carte hors-jeu');
        $manager->persist($statut);
        $manager->flush();
    }
}
