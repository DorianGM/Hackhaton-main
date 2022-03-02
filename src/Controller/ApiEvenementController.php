<?php

namespace App\Controller;

use App\Entity\Evenement;
use App\Entity\InscriptionEvent;
use App\Entity\Hackathon;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

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

    /**
     * @Route("/api/add/inscriptionevent", name="apiInscriptionEvent", methods="POST")
     */
    public function addInscription(Request $request)
    {
        // On instancie un nouvel article
        $inscription = new InscriptionEvent();

        // On décode les données envoyées
        $donnees = json_decode($request->getContent());

        $repository = $this->getDoctrine()->getRepository(Evenement::class);
        $Evenement=$repository->find($donnees->evenement);

        // On hydrate l'objet 
        $inscription->setIdevent($Evenement);
        $inscription->setPrenomievent($donnees->prenom);
        $inscription->setNomievent($donnees->nom);
        $inscription->setMailievent($donnees->mail);
        $Evenement->setNbparticipants($Evenement->getNbParticipants()-1);


        if()
        // On sauvegarde en base
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($inscription);
        $entityManager->persist($Evenement);

        $entityManager->flush();     


        // On retourne la confirmation
        return new Response('ok', 200);
    }
}
