<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * InscriptionEvent
 *
 * @ORM\Table(name="inscriptionevent" , indexes={@ORM\Index(name="contrainte", columns={"idEvent"})})
 * @ORM\Entity(repositoryClass=InscriptionEvenement::class)
 */
class InscriptionEvent
{
    /**
     * @var int
     *
     * @ORM\Column(name="idIEvent", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idievent;

    /**
     * @var Evenement
     *
     * @ORM\ManyToOne(targetEntity="Evenement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idEvent", referencedColumnName="idEvent")
     * })
     */
    private $idevent;


    /**
     * @var string
     *
     * @ORM\Column(name="nomIEvent", type="string", length=255, nullable=false)
     */
    private $nomievent;


    /**
     * @var string
     *
     * @ORM\Column(name="prenomIEvent", type="string", length=255, nullable=false)
     */
    private $prenomievent;

    /**
     * @var string
     *
     * @ORM\Column(name="mailIEvent", type="string", length=255, nullable=false)
     */
    private $mailievent;
    

    /**
     * Get the value of mailievent
     *
     * @return  string
     */ 
    public function getMailievent()
    {
        return $this->mailievent;
    }

    /**
     * Set the value of mailievent
     *
     * @param  string  $mailievent
     *
     * @return  self
     */ 
    public function setMailievent(string $mailievent)
    {
        $this->mailievent = $mailievent;

        return $this;
    }

    /**
     * Get the value of prenomievent
     *
     * @return  string
     */ 
    public function getPrenomievent()
    {
        return $this->prenomievent;
    }

    /**
     * Set the value of prenomievent
     *
     * @param  string  $prenomievent
     *
     * @return  self
     */ 
    public function setPrenomievent(string $prenomievent)
    {
        $this->prenomievent = $prenomievent;

        return $this;
    }

    /**
     * Get the value of nomievent
     *
     * @return  string
     */ 
    public function getNomievent()
    {
        return $this->nomievent;
    }

    /**
     * Set the value of nomievent
     *
     * @param  string  $nomievent
     *
     * @return  self
     */ 
    public function setNomievent(string $nomievent)
    {
        $this->nomievent = $nomievent;

        return $this;
    }

    /**
     * Get the value of idievent
     *
     * @return  int
     */ 
    public function getIdievent()
    {
        return $this->idievent;
    }

    /**
     * Set the value of idievent
     *
     * @param  int  $idievent
     *
     * @return  self
     */ 
    public function setIdievent(int $idievent)
    {
        $this->idievent = $idievent;

        return $this;
    }

    /**
     * Get the value of idevent
     *
     * @return  Evenement
     */ 
    public function getIdevent()
    {
        return $this->idevent;
    }

    /**
     * Set the value of idevent
     *
     * @param  Evenement  $idevent
     *
     * @return  self
     */ 
    public function setIdevent(?Evenement $idevent)
    {
        $this->idevent = $idevent;

        return $this;
    }
}