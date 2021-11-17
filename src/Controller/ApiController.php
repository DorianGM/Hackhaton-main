<?php

namespace App\Controller;

use App\Entity\Hackathon;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;


class ApiController extends AbstractController
{
    /**
     * @Route("/api/hackathons", name="api", methods="GET")
     */
    public function index(): JsonResponse
    {
        $repository=$this->getDoctrine()->getRepository(Hackathon::class);
        $lesHackathons= $repository->findAll();
        $tabJSON=[];
        foreach ($lesHackathons as $unHackathon){
            $tabJSON[] = [
                'id'=>$unHackathon->getIdh(),
                'dateDebut'=>$unHackathon->getDatedebut(),
                'heureDebut'=>$unHackathon->getHeuredebut(),
                'dateFin'=>$unHackathon->getDatefin(),
                'heureFin'=>$unHackathon->getHeurefin(),
                'lieu'=>$unHackathon->getLieu(),
                'rue'=>$unHackathon->getRue(),
                'ville'=>$unHackathon->getVille(),
                'cp'=>$unHackathon->getCodepostal(),
                'theme'=>$unHackathon->getTheme(),
                'dateLimite'=>$unHackathon->getDatelimite(),
                'nbPlaces'=>$unHackathon->getNbplaces(),
                'image'=>$unHackathon->getImage(),
            ];
        }


        return new JsonResponse($tabJSON);
    }
}
