<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ModeleProdRepository")
 */
class ModeleProd
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
     * @ORM\Column(type="string", length=255)
     */
    private $grammage;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $utilisation;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ProdEntret", mappedBy="modeleProd")
     */
    private $prodEntrets;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\MarqueProd", inversedBy="marqueprods")
     */
    private $marqueProd;

    public function __construct()
    {
        $this->prodEntrets = new ArrayCollection();
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

    public function getGrammage(): ?string
    {
        return $this->grammage;
    }

    public function setGrammage(string $grammage): self
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
     * @return Collection|ProdEntret[]
     */
    public function getProdEntrets(): Collection
    {
        return $this->prodEntrets;
    }

    public function addProdEntret(ProdEntret $prodEntret): self
    {
        if (!$this->prodEntrets->contains($prodEntret)) {
            $this->prodEntrets[] = $prodEntret;
            $prodEntret->setModeleProd($this);
        }

        return $this;
    }

    public function removeProdEntret(ProdEntret $prodEntret): self
    {
        if ($this->prodEntrets->contains($prodEntret)) {
            $this->prodEntrets->removeElement($prodEntret);
            // set the owning side to null (unless already changed)
            if ($prodEntret->getModeleProd() === $this) {
                $prodEntret->setModeleProd(null);
            }
        }

        return $this;
    }

    public function getMarqueProd(): ?MarqueProd
    {
        return $this->marqueProd;
    }

    public function setMarqueProd(?MarqueProd $marqueProd): self
    {
        $this->marqueProd = $marqueProd;

        return $this;
    }
}
