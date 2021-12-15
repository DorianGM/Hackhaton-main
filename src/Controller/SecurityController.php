<?php 
namespace App\Controller; 

use App\Entity\Users;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController; 
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
        return $this->render('security/login.html.twig',['lastUsername'=>$lastUsername,'errors'=>$errors]);
    } 

    /** 
     * @Route("/logout", name="security_logout") 
     */ 
    public function logout() 
    { 
        return $this->render('security/login.html.twig');
        
    } 
}