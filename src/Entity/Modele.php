<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ModeleRepository")
 */
class Modele
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
    private $libelle;

   
 /**
     * @ORM\Column(type="integer")
     */
    private $poids;
    
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $couleur;


    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Bureau", mappedBy="modele")
     */
    private $bureaux;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Categorie", inversedBy="modeles")
     */
    private $categorie;

    public function __construct()
    {
        $this->bureaux = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    // public function getPrix(): ?int
    // {
    //     return $this->prix;
    // }

    // public function setPrix(int $prix): self
    // {
    //     $this->prix = $prix;

    //     return $this;
    // }

    // public function getImage(): ?string
    // {
    //     return $this->image;
    // }

    // public function setImage(string $image): self
    // {
    //     $this->image = $image;

    //     return $this;
    // }

    /**
     * @return Collection|Bureau[]
     */
    public function getBureaux(): Collection
    {
        return $this->bureaux;
    }

    public function addBureaux(Bureau $bureaux): self
    {
        if (!$this->bureaux->contains($bureaux)) {
            $this->bureaux[] = $bureaux;
            $bureaux->setModele($this);
        }

        return $this;
    }

    public function removeBureaux(Bureau $bureaux): self
    {
        if ($this->bureaux->contains($bureaux)) {
            $this->bureaux->removeElement($bureaux);
            // set the owning side to null (unless already changed)
            if ($bureaux->getModele() === $this) {
                $bureaux->setModele(null);
            }
        }

        return $this;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorie $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getPoids(): ?int
    {
        return $this->poids;
    }

    public function setPoids(int $poids): self
    {
        $this->poids = $poids;

        return $this;
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
}
