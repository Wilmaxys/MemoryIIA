<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CarteRepository")
 */
class Carte
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fichier;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\PlateauCarte", mappedBy="carte")
     */
    private $plateauCartes;

    public function __construct()
    {
        $this->plateauCartes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFichier(): ?string
    {
        return $this->fichier;
    }

    public function setFichier(string $fichier): self
    {
        $this->fichier = $fichier;

        return $this;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|PlateauCarte[]
     */
    public function getPlateauCartes(): Collection
    {
        return $this->plateauCartes;
    }

    public function addPlateauCarte(PlateauCarte $plateauCarte): self
    {
        if (!$this->plateauCartes->contains($plateauCarte)) {
            $this->plateauCartes[] = $plateauCarte;
            $plateauCarte->setCarte($this);
        }

        return $this;
    }

    public function removePlateauCarte(PlateauCarte $plateauCarte): self
    {
        if ($this->plateauCartes->contains($plateauCarte)) {
            $this->plateauCartes->removeElement($plateauCarte);
            // set the owning side to null (unless already changed)
            if ($plateauCarte->getCarte() === $this) {
                $plateauCarte->setCarte(null);
            }
        }

        return $this;
    }
}
