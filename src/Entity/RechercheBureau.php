<?php

namespace App\Entity;
use Symfony\Component\Validator\Constraints as Assert;

class RechercheBureau{
    /**
     * @Assert\LessThanOrEqual(propertyPath="maxPrix", message="doit être plus petit que le Prix Min")
     */
    private $minPrix;

    /**
     * @Assert\GreaterThanOrEqual(propertyPath="minPrix", message="doit être plus grand que le Prix Min")
     */
    private $maxPrix;

    public function getMinPrix(){
        return $this->minPrix;
    }
    public function getMaxPrix(){
        return $this->maxPrix;
    }
    public function setMinPrix(int $prix){
        $this->minPrix = $prix;
        return $this;
    }
    public function setMaxPrix(int $prix){
        $this->maxPrix = $prix;
        return $this;
    }
}