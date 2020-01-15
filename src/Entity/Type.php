<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TypeRepository")
 */
class Type
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
    private $couleur;

    /**
     * @ORM\Column(type="integer")
     */
    private $grammage;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $utilisation;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\papeterie", mappedBy="type")
     */
    private $papeteries;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Marque", inversedBy="types")
     */
    private $marque;

    public function __construct()
    {
        $this->papeteries = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCouleur(): ?string
    {
        return $this->couleur;
    }

    public function setCouleur(string $couleur): self
    {
        $this->couleur = $couleur;

        return $this;
    }

    public function getGrammage(): ?int
    {
        return $this->grammage;
    }

    public function setGrammage(int $grammage): self
    {
        $this->grammage = $grammage;

        return $this;
    }

    public function getUtilisation(): ?string
    {
        return $this->utilisation;
    }

    public function setUtilisation(string $utilisation): self
    {
        $this->utilisation = $utilisation;

        return $this;
    }

    /**
     * @return Collection|papeterie[]
     */
    public function getPapeteries(): Collection
    {
        return $this->papeteries;
    }

    public function addPapetery(papeterie $papetery): self
    {
        if (!$this->papeteries->contains($papetery)) {
            $this->papeteries[] = $papetery;
            $papetery->setType($this);
        }

        return $this;
    }

    public function removePapetery(papeterie $papetery): self
    {
        if ($this->papeteries->contains($papetery)) {
            $this->papeteries->removeElement($papetery);
            // set the owning side to null (unless already changed)
            if ($papetery->getType() === $this) {
                $papetery->setType(null);
            }
        }

        return $this;
    }

    public function getMarque(): ?Marque
    {
        return $this->marque;
    }

    public function setMarque(?Marque $marque): self
    {
        $this->marque = $marque;

        return $this;
    }
}
