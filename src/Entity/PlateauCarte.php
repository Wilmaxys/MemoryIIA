<?php

namespace App\Entity;

use App\Entity\Plateau;
use App\Entity\User;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PlateauRepository")
 */
class PlateauCarte
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Statut")
     * @ORM\JoinColumn(nullable=false)
     */
    private $statut;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Plateau", inversedBy="plateauCarte")
     */
    private $plateau;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Carte", inversedBy="plateauCartes")
     */
    private $carte;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $position;

    public function __construct($statut,$plateau,$carte)
    {
        $this->setPlateau($plateau);
        $this->setStatut($statut);
        $this->setCarte($carte);
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStatut(): ?Statut
    {
        return $this->statut;
    }

    public function setStatut(?Statut $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getPlateau(): ?Plateau
    {
        return $this->plateau;
    }

    public function setPlateau(?Plateau $plateau): self
    {
        $this->plateau = $plateau;

        return $this;
    }

    public function getCarte(): ?Carte
    {
        return $this->carte;
    }

    public function setCarte(?Carte $carte): self
    {
        $this->carte = $carte;

        return $this;
    }

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(?int $position): self
    {
        $this->position = $position;

        return $this;
    }


}
