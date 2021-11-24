<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\Hackathon;

/**
 * Inscription
 *
 * @ORM\Table(name="inscription", indexes={@ORM\Index(name="idH", columns={"idHackathon"}), @ORM\Index(name="idP", columns={"idParticipant"})})
 * @ORM\Entity
 */
class Inscription
{
    /**
     * @var int
     *
     * @ORM\Column(name="idI", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idi;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateInscription", type="date", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $dateinscription = 'CURRENT_TIMESTAMP';

    /**
     * @var string
     *
     * @ORM\Column(name="texte", type="string", length=256, nullable=false)
     */
    private $texte;

    /**
     * @var \Hackathon
     *
     * @ORM\ManyToOne(targetEntity="Hackathon")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idHackathon", referencedColumnName="idH")
     * })
     */
    private $idhackathon;

    /**
     * @var \Participant
     *
     * @ORM\ManyToOne(targetEntity="Participant")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idParticipant", referencedColumnName="idP")
     * })
     */
    private $idparticipant;

    public function getIdi(): ?int
    {
        return $this->idi;
    }

    public function getDateinscription(): ?\DateTimeInterface
    {
        return $this->dateinscription;
    }

    public function setDateinscription(\DateTimeInterface $dateinscription): self
    {
        $this->dateinscription = $dateinscription;

        return $this;
    }

    public function getTexte(): ?string
    {
        return $this->texte;
    }

    public function setTexte(string $texte): self
    {
        $this->texte = $texte;

        return $this;
    }

    public function getIdhackathon(): ?Hackathon
    {
        return $this->idhackathon;
    }

    public function setIdhackathon(?Hackathon $idhackathon): self
    {
        $this->idhackathon = $idhackathon;

        return $this;
    }

    public function getIdparticipant(): ?Participant
    {
        return $this->idparticipant;
    }

    public function setIdparticipant(?Participant $idparticipant): self
    {
        $this->idparticipant = $idparticipant;

        return $this;
    }


}
