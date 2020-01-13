<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RecherchePapeterieRepository")
 */
class RechercheEntretien
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
    private $minPrix;

    /**
     * @ORM\Column(type="integer")
     */
    private $maxPrix;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMinPrix(): ?int
    {
        return $this->minPrix;
    }

    public function setMinPrix(int $minPrix): self
    {
        $this->minPrix = $minPrix;

        return $this;
    }

    public function getMaxPrix(): ?int
    {
        return $this->maxPrix;
    }

    public function setMaxPrix(int $maxPrix): self
    {
        $this->maxPrix = $maxPrix;

        return $this;
    }
}
