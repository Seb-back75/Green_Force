<?php
// src/Entity/User.php

namespace App\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 * @UniqueEntity(fields={"username"}, message="There is already an account with this username")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $entreprise;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $responsable;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Length(min="10",minMessage="Votre numero de téléphone doit faire minimum 10 caractères")
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresseL;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $villeL;

     /**
     * @ORM\Column(type="integer")
     * @Assert\Length(min="5",minMessage="Votre numero de téléphone doit faire minimum 5 caractères")
     */
    private $CpL;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresseF;

      /**
     * @ORM\Column(type="string", length=255)
     */
    private $villeF;

     /**
     * @ORM\Column(type="integer")
     * @Assert\Length(min="5",minMessage="Votre numero de téléphone doit faire minimum 5 caractères")
     */
    private $CpF;

      /**
     * @ORM\Column(type="integer")
     */
    private $NTVA;

    /**
     * @ORM\Column(type="integer")
     */
    private $NSIRET;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $NKBIS;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEntreprise(): ?string
    {
        return $this->entreprise;
    }

    public function setEntreprise(string $entreprise): self
    {
        $this->entreprise = $entreprise;

        return $this;
    }

    public function getResponsable(): ?string
    {
        return $this->responsable;
    }

    public function setResponsable(string $responsable): self
    {
        $this->responsable = $responsable;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getAdresseL(): ?string
    {
        return $this->adresseL;
    }

    public function setAdresseL(string $adresseL): self
    {
        $this->adresseL = $adresseL;

        return $this;
    }

    public function getVilleL(): ?string
    {
        return $this->villeL;
    }

    public function setVilleL(string $villeL): self
    {
        $this->villeL = $villeL;

        return $this;
    }

    public function getCpL(): ?int
    {
        return $this->CpL;
    }

    public function setCpL(int $CpL): self
    {
        $this->CpL = $CpL;

        return $this;
    }

    public function getAdresseF(): ?string
    {
        return $this->adresseF;
    }

    public function setAdresseF(string $adresseF): self
    {
        $this->adresseF = $adresseF;

        return $this;
    }

    public function getVilleF(): ?string
    {
        return $this->villeF;
    }

    public function setVilleF(string $villeF): self
    {
        $this->villeF = $villeF;

        return $this;
    }

    public function getCpF(): ?int
    {
        return $this->CpF;
    }

    public function setCpF(int $CpF): self
    {
        $this->CpF = $CpF;

        return $this;
    }

    public function getNTVA(): ?int
    {
        return $this->NTVA;
    }

    public function setNTVA(int $NTVA): self
    {
        $this->NTVA = $NTVA;

        return $this;
    }

    public function getNSIRET(): ?int
    {
        return $this->NSIRET;
    }

    public function setNSIRET(int $NSIRET): self
    {
        $this->NSIRET = $NSIRET;

        return $this;
    }

    public function getNKBIS(): ?string
    {
        return $this->NKBIS;
    }

    public function setNKBIS(string $NKBIS): self
    {
        $this->NKBIS = $NKBIS;

        return $this;
    }
}


    