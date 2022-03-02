<?php 
namespace App\Controller;

use App\Entity\Inscription;
use App\Entity\Hackathon;
use App\Entity\Users;
use App\Entity\Participant;
use App\Form\InscriptionFormType;
use App\Form\InscriptionHackatFormType;
use DateTime;
use DateTimeZone;
use SebastianBergmann\Environment\Console;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Validator\Constraints\Date;

class SecurityController extends AbstractController 
{ 
    /** 
     * @Route("/login", name="security_login") 
     */ 
    public function login(AuthenticationUtils $authenticationUtils) 
    { 
        //$repository = $this->getDoctrine()->getRepository(Users::Class);
        //$lesUsers = $repository->findAll();
        $lastUsername=$authenticationUtils->getLastUsername();$errors=$authenticationUtils->getLastAuthenticationError();
        
        return $this->render('security/login.html.twig',[
            'lastUsername'=>$lastUsername,'errors'=>$errors
        ]);
    } 

    /** 
     * @Route("/logout", name="security_logout") 
     */ 
    public function logout() 
    { 
        return $this->render('security/login.html.twig');
        
    } 

    /** 
     * @Route("/inscription", name="security_inscription") 
     */ 
    public function inscription(Participant $participant = null ,Request $request): Response
    { 
        $entityManager = $this->getDoctrine()->getManager();
        if(!$participant){
            $participant = new Participant();
        }

        $form =$this->createForm(InscriptionFormType::class, $participant);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            
        $entityManager->persist($participant);
        $entityManager->flush();

        return $this->redirectToRoute('home');
        }
        return $this->render('security/inscription.html.twig', [
            'form' => $form->createView(),
        ]);
        
    } 

        /** 
     * @Route("/inscriptionHackat/{idHackat}", name="security_inscriptionHackat") 
     */ 
    public function inscriptionHackat(Request $request, Hackathon $idHackat): Response
    { 
        $entityManager = $this->getDoctrine()->getManager();

        $inscription = new Inscription();
        $form =$this->createForm(InscriptionHackatFormType::class, $inscription);
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()){
        $datetime = new DateTime('now');
        $repository = $this->getDoctrine()->getRepository(Hackathon::class);
        $hackathon = $repository->find($idHackat);

        $inscription->setIdhackathon($hackathon);
        $nbplaces = $hackathon->getNbplaces();
        $hackathon->setNbplaces($nbplaces-1);

        $inscription->setDateinscription($datetime);
        $inscription->setIdparticipant($this->getUser());

        $entityManager->persist($inscription);
        $entityManager->persist($hackathon); // persist de l'objet hackathon 
        $entityManager->flush();    

        return $this->redirectToRoute('home');
        }
        return $this->render('security/inscriptionHackat.html.twig', [
            'form' => $form->createView(),

        ]);
        
    } 
}