<?php

namespace App\Controller;

use App\Entity\Hackathon;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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
    public function lesHackathons(): Response
    {
        $repository=$this->getDoctrine()->getRepository(Hackathon::class);
        $lesHackathons = $repository->parNbPlaces();
        $lesVilles = $repository->parVille();
    

        return $this->render('home/listhackathons.html.twig', [
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


        return $this->render('home/parville.html.twig', [
            'hackathon' => $hackathon,
            
        ]);
    }
}
