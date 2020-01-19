<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PaiementRepository")
 */
class Paiement
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Length(min="16",minMessage="Votre carte doit contenir 12 caractères")
     */
    private $Numero_CB;

    /**
     * @ORM\Column(type="integer")
     */
    private $Mois;

    /**
     * @ORM\Column(type="integer")
     */
    private $Annee;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Nom_Titulaire;

    /**
     * @ORM\Column(type="integer")
     */
    private $CVC;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroCB(): ?int
    {
        return $this->Numero_CB;
    }

    public function setNumeroCB(int $Numero_CB): self
    {
        $this->Numero_CB = $Numero_CB;

        return $this;
    }

    public function getMois(): ?int
    {
        return $this->Mois;
    }

    public function setMois(int $Mois): self
    {
        $this->Mois = $Mois;

        return $this;
    }

    public function getAnnee(): ?int
    {
        return $this->Annee;
    }

    public function setAnnee(int $Annee): self
    {
        $this->Annee = $Annee;

        return $this;
    }

    public function getNomTitulaire(): ?string
    {
        return $this->Nom_Titulaire;
    }

    public function setNomTitulaire(string $Nom_Titulaire): self
    {
        $this->Nom_Titulaire = $Nom_Titulaire;

        return $this;
    }

    public function getCVC(): ?int
    {
        return $this->CVC;
    }

    public function setCVC(int $CVC): self
    {
        $this->CVC = $CVC;

        return $this;
    }
}
