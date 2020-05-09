<?php

namespace App\DataFixtures;

use App\Entity\Partie;
use App\Entity\Plateau;
use App\Entity\PlateauCarte;
use App\Repository\StatutRepository;
use App\Repository\UserRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class GameFixtures extends Fixture implements DependentFixtureInterface
{
    private $userRepo;
    private $statutRepo;
    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(UserRepository $userRepo, StatutRepository $statutRepo)
    {
        $this->userRepo = $userRepo;
        $this->statutRepo = $statutRepo;
    }

    public function getDependencies()
    {
        return array(CardFixtures::class, StatutFixtures::class, UserFixtures::class);
    }

    public function load(ObjectManager $manager)
    {
        /*$partie = new Partie();
        $partie->setCreated(new \DateTime("now"));

        $partie->setJoueur($this->userRepo->findOneByUsername('demo'));

        $plateau = new Plateau();
        $statut = $this->statutRepo->findOneByName('Dos');

        $partie->setFini(false);
        $partie->setPlateau($plateau);

        $qb = $manager->createQueryBuilder();
        $qb->select('u')
            ->from('App\Entity\Carte', 'u')
            ->setMaxResults(8);
        $query = $qb->getQuery();
        $resultCollection = $query->getResult();


        $tmp = [];
        foreach ($resultCollection as $carte){
            $carte1= new PlateauCarte($statut,$plateau,$carte);
            $carte2= new PlateauCarte($statut,$plateau,$carte);
            array_push($tmp,$carte1,$carte2);
        }
        shuffle($tmp);

        $i = 1;
        foreach ($tmp as $plateauCarteVal){
            $plateauCarteVal->setPosition($i);
            $plateau->addPlateauCarte($plateauCarteVal);
            $manager->persist($plateauCarteVal);
            $i++;
        }

        $manager->persist($plateau);
        $manager->persist($partie);
        $manager->flush();*/
    }
}
