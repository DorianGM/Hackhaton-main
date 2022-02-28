<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Participant
 *
 * @ORM\Table(name="participant")
 * @ORM\Entity
 */
class Participant implements UserInterface, PasswordAuthenticatedUserInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="idP", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idp;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=20, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=20, nullable=false)
     */
    private $prenom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateNaiss", type="date", nullable=false)
     */
    private $datenaiss;

    /**
     * @var string
     *
     * @ORM\Column(name="rue", type="string", length=50, nullable=false)
     */
    private $rue;

    /**
     * @var string
     *
     * @ORM\Column(name="cp", type="string", length=5, nullable=false)
     */
    private $cp;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=50, nullable=false)
     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=30, nullable=false)
     */
    private $mail;

    /**
     * @var string
     *
     * @ORM\Column(name="numTel", type="string", length=10, nullable=false)
     */
    private $numtel;

    /**
     * @var string
     *
     * @ORM\Column(name="portfolio", type="string", length=256, nullable=false)
     */
    private $portfolio;

    /**
     * @var string|null
     *
     * @ORM\Column(name="login", type="string", length=30, nullable=true)
     */
    private $username;

    /**
     * @var string|null
     *
     * @ORM\Column(name="mdphash", type="string", length=128, nullable=true)
     */
    private $mdphash;

    /** 
     * @ORM\Column(type="json") 
     */ 
    private $roles = []; 

    public function getIdp(): ?int
    {
        return $this->idp;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getDatenaiss(): ?\DateTimeInterface
    {
        return $this->datenaiss;
    }

    public function setDatenaiss(\DateTimeInterface $datenaiss): self
    {
        $this->datenaiss = $datenaiss;

        return $this;
    }

    public function getRue(): ?string
    {
        return $this->rue;
    }

    public function setRue(string $rue): self
    {
        $this->rue = $rue;

        return $this;
    }

    public function getCp(): ?string
    {
        return $this->cp;
    }

    public function setCp(string $cp): self
    {
        $this->cp = $cp;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getNumtel(): ?string
    {
        return $this->numtel;
    }

    public function setNumtel(string $numtel): self
    {
        $this->numtel = $numtel;

        return $this;
    }

    public function getPortfolio(): ?string
    {
        return $this->portfolio;
    }

    public function setPortfolio(string $portfolio): self
    {
        $this->portfolio = $portfolio;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(?string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->mdphash;
    }

    public function setPassword(?string $mdphash): self
    {
        $this->mdphash = $mdphash;

        return $this;
    }

    /** 
     * A visual identifier that represents this user. 
     * @see UserInterface 
     */ 
    public function getUserIdentifier(): string 
    { 
        return (string) $this->username;  
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
