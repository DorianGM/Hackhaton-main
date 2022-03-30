<?php

namespace App\Controller;

use App\Entity\Favoris;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Hackathon;
use App\Entity\Inscription;
use App\Entity\Users;
use App\Entity\Participant;
use App\Form\InscriptionFormType;
use App\Form\InscriptionHackatFormType;
use DateTime;
use DateTimeZone;
use SebastianBergmann\Environment\Console;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Validator\Constraints\Date;
use App\Form\FavorisType;

class FavorisController extends AbstractController
{
    /**
     * @Route("/participants/{idP}/favoris", name="favoris")
     */
    public function index($idP): Response
    {
        $repository = $this->getDoctrine()->getRepository(Favoris::class);
        $lesFavs = $repository->findBy(array('idparti' => $idP));

        return $this->render('favoris/index.html.twig', [
            'favs' => $lesFavs,
        ]);
    }


    /** 
     * @Route("/listhackathons/{idH}", name="addFav") 
     */ 
    public function addFav($idH)
    { 
        $entityManager = $this->getDoctrine()->getManager();

        $favoris = new Favoris();
        $repository = $this->getDoctrine()->getRepository(Hackathon::class);
        $hackathon = $repository->find($idH);

        $favoris->setIdhackatfav($hackathon);
        $favoris->setIdparti($this->getUser());
        $repository1 = $this->getDoctrine()->getRepository(Favoris::class);
        $favs = $repository1->findBy(array('idparti' => $this->getUser(), 'idhackatfav' => $idH));
            if(empty($favs)){
                $entityManager->persist($favoris);
                $entityManager->persist($hackathon);
                $entityManager->flush();  
            }
            else{
                
            }

        
         // persist de l'objet hackathon 
        
        return $this->redirectToRoute('listHack');
    }  

    /**
     * @Route("/participants/{idP}/favoris/delete/{idF}", name="deleteFav", requirements={"id"="\d+"}, methods="DELETE")
     */
    public function deleteUneSerie(Request $request, $idP, $idF): Response
    {
        $idP = $this->getUser();
        $repository = $this->getDoctrine()->getRepository(Favoris::class);
        $leFav=$repository->find($idF);
        $em=$this->getDoctrine()->getManager();
        $em->remove($leFav);
        $em->flush();
        
        return $this->redirectToRoute("home");
    }
}
