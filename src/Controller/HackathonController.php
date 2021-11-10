<?php

namespace App\Controller;

use App\Entity\Hackathon;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HackathonController extends AbstractController
{
    /**
     * @Route("/listhackathons/{id}", name="details")
     */
    public function index($id): Response
    {
        $repository = $this->getDoctrine()->getRepository(Hackathon::class);
        $leHackathon=$repository->find($id);
        

        return $this->render('hackathon/index.html.twig', [
            'hackathon' => $leHackathon,
        ]);
    }
}
