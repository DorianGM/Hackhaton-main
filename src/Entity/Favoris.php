<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\FavorisRepository;

/**
 * Favoris
 *
 * @ORM\Table(name="favoris", indexes={@ORM\Index(name="idParti", columns={"idParti"}), @ORM\Index(name="idHackatFav", columns={"idHackatFav"})})
 * @ORM\Entity(repositoryClass=FavorisRepository::class)
 */
class Favoris
{
    /**
     * @var int
     *
     * @ORM\Column(name="idF", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idf;

    /**
     * @var Participant
     *
     * @ORM\ManyToOne(targetEntity="Participant")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idParti", referencedColumnName="idP")
     * })
     */
    private $idparti;

    /**
     * @var Hackathon
     *
     * @ORM\ManyToOne(targetEntity="Hackathon")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idHackatFav", referencedColumnName="idH")
     * })
     */
    private $idhackatfav;

    /**
     * Get the value of idf
     *
     * @return  int
     */ 
    public function getIdf()
    {
        return $this->idf;
    }

    /**
     * Set the value of idf
     *
     * @param  int  $idf
     *
     * @return  self
     */ 
    public function setIdf(int $idf)
    {
        $this->idf = $idf;

        return $this;
    }

    /**
     * Get the value of idparti
     *
     * @return  \Participant
     */ 
    public function getIdparti()
    {
        return $this->idparti;
    }

    /**
     * Set the value of idparti
     *
     * @param  \Participant  $idparti
     *
     * @return  self
     */ 
    public function setIdparti(Participant $idparti)
    {
        $this->idparti = $idparti;

        return $this;
    }

    /**
     * Get the value of idhackatfav
     *
     * @return  \Hackathon
     */ 
    public function getIdhackatfav()
    {
        return $this->idhackatfav;
    }

    /**
     * Set the value of idhackatfav
     *
     * @param  \Hackathon  $idhackatfav
     *
     * @return  self
     */ 
    public function setIdhackatfav(Hackathon $idhackatfav)
    {
        $this->idhackatfav = $idhackatfav;

        return $this;
    }
}
