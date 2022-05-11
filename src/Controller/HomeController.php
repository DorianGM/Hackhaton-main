<?php

namespace App\Controller;

use App\Entity\Hackathon;
use App\Entity\Participant;
use App\Form\InscriptionFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Favoris;
use DateTime;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        return $this->render('home/index.html.twig');
    }

    /**
     * @Route("/listhackathons", name="listHack")
     */
    public function lesHackathons(Participant $participant = null, Request $request): Response
    {
        $repository=$this->getDoctrine()->getRepository(Hackathon::class);
        $lesHackathons = $repository->parNbPlaces();
        $ajd = new DateTime('now');
        $lesVilles = $repository->parVille($ajd);
       
    

        return $this->render('home/listhackathons.html.twig', [
            'ajd' => $ajd,
            'hackathons' => $lesHackathons,
            'villes' => $lesVilles,
        ]);
    }

    /**
     * @Route("/listhackathons/ville/{ville}", name="laville")
     */
    public function triVille($ville): Response
    {
        $repository = $this->getDoctrine()->getRepository(Hackathon::class);
        $hackathon = $repository->parVille2($ville);
        $ajd = new DateTime('now');
        $lesVilles = $repository->parVille($ajd);
        $ajd = new DateTime('now');

        

        return $this->render('home/listhackathons.html.twig', [
            'ajd' => $ajd,
            'hackathons' => $hackathon,
            'villes' => $lesVilles,
            
        ]);
    }
}
