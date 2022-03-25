<?php

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use App\Repository\UsersRepository;

/**
 * @ORM\Entity(repositoryClass=UsersRepository::class)
 */
class Users implements UserInterface, PasswordAuthenticatedUserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
    

    public function getId(): ?int
    {
        return $this->id;
    }
    public function getUsername(): string
    {
        return (string) $this->username;
    }
    /** 
     * @ORM\Column(type="json") 
     */ 
    private $roles = []; 

    public function getLogin(): ?string
    {
        return $this->login;
    }
    /** 
     * @ORM\Column(type="string") 
     */ 
    private $login; 

    /** 
     * @ORM\Column(type="string") 
     */ 
    private $password; 
 
    /** 
     * A visual identifier that represents this user. 
     * @see UserInterface 
     */ 
    public function getUserIdentifier(): string 
    { 
        return (string) $this->login;  
    } 
 
    public function getRoles(): array 
    { 
        $roles = $this->roles; 
        // guarantee every user at least has ROLE_USER 
        $roles[] = 'ROLE_USER'; 
 
        return array_unique($roles); 
    } 
 
    public function setRoles(array $roles): self 
    { 
        $this->roles = $roles; 
 
        return $this; 
    } 
 
    /** 
     * @see PasswordAuthenticatedUserInterface 
     */ 
    public function getPassword(): string 
    { 
// à remplacer éventuellement par la propriété contenant le mot de passe 
        return $this->password; 
    } 
 
    public function setPassword(string $password): self 
    { 
// à remplacer éventuellement par la propriété contenant le mot de passe 
        $this->password = $password; 
 
        return $this; 
    } 
 
    /** 
     * Returning a salt is only needed, if you are not using a modern 
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml. 
     * 
     * @see UserInterface 
     */ 
    public function getSalt() 
    { 
         return null;
    } 
 
    /** 
     * @see UserInterface 
     */ 
    public function eraseCredentials() 
    { 
        // If you store any temporary, sensitive data on the user, clear it he
        // $this->plainPassword = null; 
    }
}