<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use FOS\UserBundle\Model\User as BaseUser;

    /**
     * @ORM\Entity
     * @ORM\Table(name="fos_user")
     */
    class User extends BaseUser {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $entreprise;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $responsable;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min="8",minMessage="Votre mot de passe doit faire minimum 8 caractères")
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min="10",minMessage="Votre numero de téléphone doit faire minimum 10 caractères")
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min="8",minMessage="Votre mot de passe doit faire minimum 8 caractères")
     */
    private $mdp;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\EqualTo(propertyPath="confirm_mdp", message="Votre mot de passe doit etre le même que celui que vous confirmez")
     */
    public $confirm_mdp;

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

    public function eraseCredentials() {}

    public function getSalt() {}

    public function getRoles() {
        return ['ROLE_USER'];
    }

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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

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

    public function getMdp(): ?string
    {
        return $this->mdp;
    }

    public function setMdp(string $mdp): self
    {
        $this->mdp = $mdp;

        return $this;
    }

    public function getConfirmMdp(): ?string
    {
        return $this->confirm_mdp;
    }

    public function setConfirmMdp(string $confirm_mdp): self
    {
        $this->confirm_mdp = $confirm_mdp;

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

    public function getCpL(): ?string
    {
        return $this->CpL;
    }

    public function setCpL(string $CpL): self
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

    public function getCpF(): ?string
    {
        return $this->CpF;
    }

    public function setCpF(string $CpF): self
    {
        $this->CpF = $CpF;

        return $this;
    }

    public function getNTVA(): ?string
    {
        return $this->NTVA;
    }

    public function setNTVA(string $NTVA): self
    {
        $this->NTVA = $NTVA;

        return $this;
    }

    public function getNSIRET(): ?string
    {
        return $this->NSIRET;
    }

    public function setNSIRET(string $NSIRET): self
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
