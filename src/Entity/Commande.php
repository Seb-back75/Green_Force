<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\HttpFoundation\File\File;
use Doctrine\Common\Collections\ArrayCollection;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommandeRepository")
 */
class Commande
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $numcom;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="string")
     */
    private $produit;
    
    /**
     * @ORM\Column(type="integer")
     */
    private $Pv;

    /**
     * @ORM\Column(type="float")
     */
    private $tht;

    /**
     * @ORM\Column(type="float")
     */
    private $ttva;

    /**
     * @ORM\Column(type="string", nullable = true)
     */
    private $tttc;
    
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Image;

    /**
     * @Vich\UploadableField(mapping="post_image", fileNameProperty="image")
     * @var File
     */
    private $imageFile;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumcom(): ?int
    {
        return $this->numcom;
    }

    public function setNumcom(int $numcom): self
    {
        $this->numcom = $numcom;

        return $this;
    }


    public function getTht(): ?float
    {
        return $this->tht;
    }

    public function setTht(float $tht): self
    {
        $this->tht = $tht;

        return $this;
    }

    public function getTtva(): ?float
    {
        return $this->ttva;
    }

    public function setTtva(float $ttva): self
    {
        $this->ttva = $ttva;

        return $this;
    }

    public function getTttc(): ?float
    {
        return $this->tttc;
    }

    public function setTttc(float $tttc): self
    {
        $this->tttc = $tttc;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getProduit(): ?string
    {
        return $this->produit;
    }

    public function setProduit(string $produit): self
    {
        $this->produit = $produit;

        return $this;
    }
    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;
    }

    public function getImageFile()
    {
        return $this->imageFile;
    }

    public function getImage(): ?string
    {
        return $this->Image;
    }

    public function setImage(string $Image): self
    {
        $this->Image = $Image;

        return $this;
    }
    public function getPv(): ?int
    {
        return $this->Pv;
    }

    public function setPv(int $Pv): self
    {
        $this->Pv = $Pv;

        return $this;
    }

}
