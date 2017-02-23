<?php

class Age {
    
    private $table = "age";
    private $clePrimaire = "id_age";
    private $idAge;
    private $ageMin;
    private $ageMax;
    
    function __construct($ageMin, $ageMax) {
        $this->ageMin = $ageMin;
        $this->ageMax = $ageMax;
    }

    function getIdAge() {
        return $this->idAge;
    }

    function getAgeMin() {
        return $this->ageMin;
    }

    function getAgeMax() {
        return $this->ageMax;
    }

    function setIdAge($idAge) {
        $this->idAge = $idAge;
    }

    function setAgeMin($ageMin) {
        $this->ageMin = $ageMin;
    }

    function setAgeMax($ageMax) {
        $this->ageMax = $ageMax;
    }



        
}