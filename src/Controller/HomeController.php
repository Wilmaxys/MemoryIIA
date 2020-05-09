<?php

namespace App\Controller;

use App\Repository\PartieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

/**
 * @Route("/")
 */
class HomeController extends AbstractController
{

    /**
     * @var PartieRepository
     */
    private $partieRepository;
    /**
     * @var Security
     */
    private $security;

    public function __construct(PartieRepository $partieRepository, Security $security)
    {
        $this->partieRepository = $partieRepository;
        $this->security = $security;
    }

    /**
     * @Route("/", name="home")
     */
    public function index(Request $request): Response
    {
        $user = $this->security->getUser();
        $parties = $this->partieRepository->findBy([ 'joueur' => $user ]);

        return $this->render('home/home.html.twig',
            [
                'parties' => $parties
            ]);
    }

}
