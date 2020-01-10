<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ClientRepository")
 */
class Client
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $Nom_Entreprise;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $Responsable;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $Adresse_de_Livraison;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $Adresse_de_Facturation;

    /**
     * @ORM\Column(type="string", length=14)
     */
    private $Telephone;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $Email;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomEntreprise(): ?string
    {
        return $this->Nom_Entreprise;
    }

    public function setNomEntreprise(string $Nom_Entreprise): self
    {
        $this->Nom_Entreprise = $Nom_Entreprise;

        return $this;
    }

    public function getResponsable(): ?string
    {
        return $this->Responsable;
    }

    public function setResponsable(string $Responsable): self
    {
        $this->Responsable = $Responsable;

        return $this;
    }

    public function getAdresseDeLivraison(): ?string
    {
        return $this->Adresse_de_Livraison;
    }

    public function setAdresseDeLivraison(string $Adresse_de_Livraison): self
    {
        $this->Adresse_de_Livraison = $Adresse_de_Livraison;

        return $this;
    }

    public function getAdresseDeFacturation(): ?string
    {
        return $this->Adresse_de_Facturation;
    }

    public function setAdresseDeFacturation(string $Adresse_de_Facturation): self
    {
        $this->Adresse_de_Facturation = $Adresse_de_Facturation;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->Telephone;
    }

    public function setTelephone(string $Telephone): self
    {
        $this->Telephone = $Telephone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }
 
   
}