<?php

namespace App\Controller;

use App\Entity\Evenement;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class ApiEvenementController extends AbstractController
{
    /**
     * @Route("/api/evenements", name="apiEvenement", methods="GET")
     */
    public function index(): JsonResponse
    {
        $repository=$this->getDoctrine()->getRepository(Evenement::class);
        $lesEvenements= $repository->findAll();
        $tabJSON=[];
        foreach ($lesEvenements as $unEvenement){
            $tabJSON[] = [
                'idEvent'=>$unEvenement->getIdevent(),
                'libelleE'=>$unEvenement->getLibellee(),
                'dateE'=>$unEvenement->getDatee(),
                'heureE'=>$unEvenement->getHeuree(),
                'dureeE'=>$unEvenement->getDureee(),
                'salleE'=>$unEvenement->getSallee(),
                'idHackat'=>$unEvenement->getIdhackat()->getIdH()
                
                
            ];
        }
        return new JsonResponse($tabJSON);
    }
}
