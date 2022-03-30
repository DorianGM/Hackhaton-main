<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commentaires
 *
 * @ORM\Table(name="commentaires", indexes={@ORM\Index(name="index1", columns={"idHa"})})
 * @ORM\Entity
 */
class Commentaires
{
    /**
     * @var int
     *
     * @ORM\Column(name="idCo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idco;

    /**
     * @var string
     *
     * @ORM\Column(name="commentaires", type="string", length=256, nullable=false)
     */
    private $commentaires;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $date = 'CURRENT_TIMESTAMP';

    /**
     * @var \Hackathon
     *
     * @ORM\ManyToOne(targetEntity="Hackathon")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idHa", referencedColumnName="idH")
     * })
     */
    private $idha;



    /**
     * Get the value of idco
     *
     * @return  int
     */ 
    public function getIdco()
    {
        return $this->idco;
    }

    /**
     * Set the value of idco
     *
     * @param  int  $idco
     *
     * @return  self
     */ 
    public function setIdco(int $idco)
    {
        $this->idco = $idco;

        return $this;
    }

    /**
     * Get the value of commentaires
     *
     * @return  string
     */ 
    public function getCommentaires()
    {
        return $this->commentaires;
    }

    /**
     * Set the value of commentaires
     *
     * @param  string  $commentaires
     *
     * @return  self
     */ 
    public function setCommentaires(string $commentaires)
    {
        $this->commentaires = $commentaires;

        return $this;
    }

    /**
     * Get the value of idha
     *
     * @return  \Hackathon
     */ 
    public function getIdha()
    {
        return $this->idha;
    }

    /**
     * Set the value of idha
     *
     * @param  \Hackathon  $idha
     *
     * @return  self
     */ 
    public function setIdha(Hackathon $idha)
    {
        $this->idha = $idha;

        return $this;
    }
}
