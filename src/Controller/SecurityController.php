<?php 
namespace App\Controller; 

use App\Entity\Users;
use App\Entity\Participant;
use App\Form\InscriptionFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;



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
        dump($lastUsername);
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
}