<?php

namespace App\Entity;

use App\Entity\Partie;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PlateauRepository")
 */
class Plateau
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Partie", mappedBy="plateau", cascade={"persist", "remove"})
     */
    private $partie;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\PlateauCarte", mappedBy="plateau", cascade={"persist", "remove"})
     */
    private $plateauCarte;

    public function __construct()
    {
        $this->cartes = new ArrayCollection();
        $this->plateauCarte = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPartie(): ?Partie
    {
        return $this->partie;
    }

    public function setPartie(Partie $partie): self
    {
        $this->partie = $partie;

        // set the owning side of the relation if necessary
        if ($partie->getPlateau() !== $this) {
            $partie->setPlateau($this);
        }

        return $this;
    }

    /**
     * @return Collection|PlateauCarte[]
     */
    public function getPlateauCarte(): Collection
    {
        return $this->plateauCarte;
    }

    public function setPlateauCarte($plateauCarte): self
    {
        $this->plateauCarte = $plateauCarte;

        return $this;
    }

    public function addPlateauCarte(PlateauCarte $plateauCarte): self
    {
        if (!$this->plateauCarte->contains($plateauCarte)) {
            $this->plateauCarte[] = $plateauCarte;
            $plateauCarte->setPlateau($this);
        }

        return $this;
    }

    public function removePlateauCarte(PlateauCarte $plateauCarte): self
    {
        if ($this->plateauCarte->contains($plateauCarte)) {
            $this->plateauCarte->removeElement($plateauCarte);
            // set the owning side to null (unless already changed)
            if ($plateauCarte->getPlateau() === $this) {
                $plateauCarte->setPlateau(null);
            }
        }

        return $this;
    }

}
