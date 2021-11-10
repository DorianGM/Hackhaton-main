<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Inscription
 *
 * @ORM\Table(name="inscription", indexes={@ORM\Index(name="idH", columns={"idHackathon"}), @ORM\Index(name="idP", columns={"idParticipant"})})
 * @ORM\Entity(repositoryClass=App\Repository\InscriptionRepository::class)
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
     * @var int
     *
     * @ORM\Column(name="idParticipant", type="integer", nullable=false)
     */
    private $idparticipant;

    /**
     * @var int
     *
     * @ORM\Column(name="idHackathon", type="integer", nullable=false)
     */
    private $idhackathon;

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

    public function getIdi(): ?int
    {
        return $this->idi;
    }

    public function getIdparticipant(): ?int
    {
        return $this->idparticipant;
    }

    public function setIdparticipant(int $idparticipant): self
    {
        $this->idparticipant = $idparticipant;

        return $this;
    }

    public function getIdhackathon(): ?int
    {
        return $this->idhackathon;
    }

    public function setIdhackathon(int $idhackathon): self
    {
        $this->idhackathon = $idhackathon;

        return $this;
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


}