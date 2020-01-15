<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MarqueProdRepository")
 */
class MarqueProd
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
     * @ORM\OneToMany(targetEntity="App\Entity\ModeleProd", mappedBy="marqueProd")
     */
    private $marqueprods;

    public function __construct()
    {
        $this->marqueprods = new ArrayCollection();
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

    /**
     * @return Collection|ModeleProd[]
     */
    public function getMarqueprods(): Collection
    {
        return $this->marqueprods;
    }

    public function addMarqueprod(ModeleProd $marqueprod): self
    {
        if (!$this->marqueprods->contains($marqueprod)) {
            $this->marqueprods[] = $marqueprod;
            $marqueprod->setMarqueProd($this);
        }

        return $this;
    }

    public function removeMarqueprod(ModeleProd $marqueprod): self
    {
        if ($this->marqueprods->contains($marqueprod)) {
            $this->marqueprods->removeElement($marqueprod);
            // set the owning side to null (unless already changed)
            if ($marqueprod->getMarqueProd() === $this) {
                $marqueprod->setMarqueProd(null);
            }
        }

        return $this;
    }
}
