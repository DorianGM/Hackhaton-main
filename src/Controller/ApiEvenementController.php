<?php

namespace App\Controller;

use App\Entity\Evenement;
use App\Entity\Hackathon;
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
        $repository=$this->getDoctrine()->getRepository(Hackathon::class);
        $lesEvenements= $repository->findAll();
        $tabJSON=[];
        foreach ($lesEvenements as $unEvenement){
            $tabJSON[] = [
                'idH'=>$unEvenement->getIdH(),
                'dateDebut'=>$unEvenement->getDateDebut(),
                'heureDebut'=>$unEvenement->getHeureDebut(),
                'dateFin'=>$unEvenement->getDateFin(),
                'heureFin'=>$unEvenement->getHeureFin(),
                'lieu'=>$unEvenement->getLieu(),
                'rue'=>$unEvenement->getRue(),
                'ville'=>$unEvenement->getVille(),
                'codePostal'=>$unEvenement->getCodePostal(),
                'theme'=>$unEvenement->getTheme(),
                'dateLimite'=>$unEvenement->getDateLimite(),
                'nbPlaces'=>$unEvenement->getNbPlaces(),
                'image'=>$unEvenement->getImage()
                
            ];
        }
        return new JsonResponse($tabJSON);
    }

    /**
     * @Route("/api/evenements/{type}", name="apiEvenementType", methods="GET")
     */
    public function index2($type): JsonResponse
    {
        $repository=$this->getDoctrine()->getRepository(Evenement::class);
        $lesEvenements= $repository->findByType($type);
        $tabJSON=[];
        foreach ($lesEvenements as $unEvenement){
            $tabJSON[] = [
                'idEvent'=>$unEvenement->getIdevent(),
                'libelleE'=>$unEvenement->getLibellee(),
                'dateE'=>$unEvenement->getDatee(),
                'heureE'=>$unEvenement->getHeuree(),
                'dureeE'=>$unEvenement->getDureee(),
                'salleE'=>$unEvenement->getSallee(),
                'idHackat'=>$unEvenement->getIdhackat()->getIdH(),
                'type'=>$unEvenement->getType(),
                'nbParticipants'=>$unEvenement->getNbparticipants(),
                'themeE'=>$unEvenement->getThemeE(),
                'intervenant'=>$unEvenement->getIntervenant()
                
            ];
        }
        return new JsonResponse($tabJSON);
    }

    /**
     * @Route("/api/evenements/initiation/{idhackat}", name="apiEvenementType", methods="GET")
     */
    public function index3($idhackat): JsonResponse
    {
        $repository=$this->getDoctrine()->getRepository(Evenement::class);
        $lesEvenements= $repository->findByIdhackat($idhackat);
        $tabJSON=[];
        foreach ($lesEvenements as $unEvenement){
            $tabJSON[] = [
                'idEvent'=>$unEvenement->getIdevent(),
                'libelleE'=>$unEvenement->getLibellee(),
                'dateE'=>$unEvenement->getDatee(),
                'heureE'=>$unEvenement->getHeuree(),
                'dureeE'=>$unEvenement->getDureee(),
                'salleE'=>$unEvenement->getSallee(),
                'idHackat'=>$unEvenement->getIdhackat()->getIdH(),
                'type'=>$unEvenement->getType(),
                'nbParticipants'=>$unEvenement->getNbparticipants(),
                'themeE'=>$unEvenement->getThemeE(),
                'intervenant'=>$unEvenement->getIntervenant()
                
            ];
        }
        return new JsonResponse($tabJSON);
    }
}
