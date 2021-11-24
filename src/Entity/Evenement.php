<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Evenement
 *
 * @ORM\Table(name="evenement", indexes={@ORM\Index(name="contrainte1", columns={"idHackat"})})
 * @ORM\Entity
 */
class Evenement
{
    /**
     * @var int
     *
     * @ORM\Column(name="idEvent", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idevent;

    /**
     * @var string
     *
     * @ORM\Column(name="libelleE", type="string", length=128, nullable=false)
     */
    private $libellee;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateE", type="date", nullable=false)
     */
    private $datee;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heureE", type="time", nullable=false)
     */
    private $heuree;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dureeE", type="time", nullable=false)
     */
    private $dureee;

    /**
     * @var string
     *
     * @ORM\Column(name="salleE", type="string", length=128, nullable=false)
     */
    private $sallee;

    /**
     * @var \Hackathon
     *
     * @ORM\ManyToOne(targetEntity="Hackathon")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idHackat", referencedColumnName="idH")
     * })
     */
    private $idhackat;

    public function getIdevent(): ?int
    {
        return $this->idevent;
    }

    public function getLibellee(): ?string
    {
        return $this->libellee;
    }

    public function setLibellee(string $libellee): self
    {
        $this->libellee = $libellee;

        return $this;
    }

    public function getDatee(): ?\DateTimeInterface
    {
        return $this->datee;
    }

    public function setDatee(\DateTimeInterface $datee): self
    {
        $this->datee = $datee;

        return $this;
    }

    public function getHeuree(): ?\DateTimeInterface
    {
        return $this->heuree;
    }

    public function setHeuree(\DateTimeInterface $heuree): self
    {
        $this->heuree = $heuree;

        return $this;
    }

    public function getDureee(): ?\DateTimeInterface
    {
        return $this->dureee;
    }

    public function setDureee(\DateTimeInterface $dureee): self
    {
        $this->dureee = $dureee;

        return $this;
    }

    public function getSallee(): ?string
    {
        return $this->sallee;
    }

    public function setSallee(string $sallee): self
    {
        $this->sallee = $sallee;

        return $this;
    }

    public function getIdhackat(): ?Hackathon
    {
        return $this->idhackat;
    }

    public function setIdhackat(?Hackathon $idhackat): self
    {
        $this->idhackat = $idhackat;

        return $this;
    }


}
