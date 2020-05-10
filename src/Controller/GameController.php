<?php

namespace App\Controller;

use App\Entity\Partie;
use App\Entity\Plateau;
use App\Entity\PlateauCarte;
use App\Repository\PartieRepository;
use App\Repository\PlateauCarteRepository;
use App\Repository\StatutRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

/**
 * @Route("/")
 */
class GameController extends AbstractController
{

    /**
     * @var PartieRepository
     */
    private $partieRepository;
    /**
     * @var Security
     */
    private $security;
    /**
     * @var ObjectManager
     */
    private $manager;
    /**
     * @var StatutRepository
     */
    private $statutRepo;

    public function __construct(PartieRepository $partieRepository, Security $security, EntityManagerInterface $manager, StatutRepository $statutRepo)
    {
        $this->partieRepository = $partieRepository;
        $this->security = $security;
        $this->manager = $manager;
        $this->statutRepo = $statutRepo;
    }

    /**
 * @Route("/game/{id}", name="game")
 */
    public function index(Request $request, int $id): Response
    {
        $partie = $this->partieRepository->find($id);

        if ($partie == null){
            return $this->redirectToRoute('home');
        }
        else{
            return $this->render('game/game.html.twig',
                [
                    'partie' => $partie
                ]);
        }
    }

    /**
     * @Route("/selectDifficulty", name="selectDifficulty")
     */
    public function selectDifficulty(Request $request): Response
    {
        $response = $this->render('game/_selectDifficulty.html.twig');
        return new JsonResponse($response->getContent());
    }

    /**
     * @Route("/newGame/{diff}", name="newGame")
     */
    public function new(Request $request, int $diff): Response
    {
        $manager = $this->manager;
        $user = $this->security->getUser();
        $user->setNbPartie($user->getNbPartie() +1);

        $partie = new Partie();
        $partie->setCreated(new \DateTime("now"));

        $partie->setJoueur($user);

        $plateau = new Plateau();
        $statut = $this->statutRepo->findOneByName('Dos');

        $partie->setFini(false);
        $partie->setPlateau($plateau);
        $partie->setNbCarte($diff);

        $qb = $manager->createQueryBuilder();
        $qb->select('u')
            ->from('App\Entity\Carte', 'u')
            ->setMaxResults($diff);
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

        $manager->persist($user);
        $manager->persist($plateau);
        $manager->persist($partie);
        $manager->flush();

        return $this->redirectToRoute('game', [
            'id' => intval($partie->getId())
    ]);
    }

    /**
     * @Route("/removeGame/{id}", name="removeGame")
     */
    public function remove(Request $request, int $id): Response
    {
        $manager = $this->manager;
        $partie = $this->partieRepository->find($id);

        if ($partie==null){
            $this->redirectToRoute('home');
        }
        else{
            $manager->remove($partie);
            $manager->flush();
        }

        return $this->redirectToRoute('home');
    }

    /**
     * @Route("/gameCard/{id}", name="gameCard")
     */
    public function getCard(Request $request, int $id, PlateauCarteRepository $PCRepo): Response
    {
        $PC = $PCRepo->find($id);

        return new JsonResponse($PC->getCarte()->getFichier());
    }

    /**
     * @Route("/findCard/{id}", name="findCard")
     */
    public function findCard(Request $request, int $id, PlateauCarteRepository $PCRepo, StatutRepository $statutRepository): Response
    {
        $manager = $this->manager;
        $PC = $PCRepo->find($id);
        $statutFace =  $statutRepository->findOneByName('Face');
        $PC->setStatut($statutFace);
        $manager->persist($PC);
        $manager->flush();

        return new JsonResponse(true);
    }

    /**
     * @Route("/getNbCarte/{id}", name="getNbCarte")
     */
    public function getNbCarte(Request $request, int $id, PartieRepository $partieRepository): Response
    {
        $partie = $partieRepository->find($id);

        return new JsonResponse($partie->getNbCarte());
    }

    /**
     * @Route("/setNbCard/{id}", name="setNbCard")
     */
    public function setNbCard(Request $request, int $id, PartieRepository $partieRepository): Response
    {
        $partie = $partieRepository->find($id);
        $nub=$request->request->get('nb');
        $partie->setNbCarte($nub);
        $this->manager->persist($partie);
        $this->manager->flush();

        return new JsonResponse($nub);
    }

    /**
     * @Route("/setGameFinished/{id}", name="setGameFinished")
     */
    public function setGameFinished(Request $request, int $id, PartieRepository $partieRepository): Response
    {
        $partie = $partieRepository->find($id);
        $partie->setFini(true);
        $partie->getJoueur()->setNbVictoire($partie->getJoueur()->getNbVictoire() + 1);
        $this->manager->persist($partie);
        $this->manager->flush();

        return new JsonResponse($partie);
    }

}
