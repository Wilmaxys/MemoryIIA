<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PartieRepository")
 */
class Partie
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="partie")
     */
    private $joueur;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Plateau", inversedBy="partie", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $plateau;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $Fini;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $Created;

    /**
     * @ORM\Column(type="integer")
     */
    private $NbCarte;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJoueur(): ?User
    {
        return $this->joueur;
    }

    public function setJoueur(?User $joueur): self
    {
        $this->joueur = $joueur;

        return $this;
    }

    public function getPlateau(): ?Plateau
    {
        return $this->plateau;
    }

    public function setPlateau(Plateau $plateau): self
    {
        $this->plateau = $plateau;

        return $this;
    }

    public function getFini(): ?bool
    {
        return $this->Fini;
    }

    public function setFini(?bool $Fini): self
    {
        $this->Fini = $Fini;

        return $this;
    }

    public function getCreated(): ?\DateTimeInterface
    {
        return $this->Created;
    }

    public function setCreated(?\DateTimeInterface $Created): self
    {
        $this->Created = $Created;

        return $this;
    }

    public function getNbCarte(): ?int
    {
        return $this->NbCarte;
    }

    public function setNbCarte(int $NbCarte): self
    {
        $this->NbCarte = $NbCarte;

        return $this;
    }
}
