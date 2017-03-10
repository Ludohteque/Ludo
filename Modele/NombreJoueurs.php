<?php

class NombreJoueurs {
    
    private $idNbJoueurs;
    private $nbJoueursMin;
    private $nbJoueursMax;
    
    function __construct($idNbJoueurs, $nbJoueursMin, $nbJoueursMax) {
        $this->idNbJoueurs = $idNbJoueurs;
        $this->nbJoueursMin = $nbJoueursMin;
        $this->nbJoueursMax = $nbJoueursMax;
    }

    function getIdNbJoueurs() {
        return $this->idNbJoueurs;
    }

    function getNbJoueursMin() {
        return $this->nbJoueursMin;
    }

    function getNbJoueursMax() {
        return $this->nbJoueursMax;
    }

    function setIdNbJoueurs($idNbJoueurs) {
        $this->idNbJoueurs = $idNbJoueurs;
    }

    function setNbJoueursMin($nbJoueursMin) {
        $this->nbJoueursMin = $nbJoueursMin;
    }

    function setNbJoueursMax($nbJoueursMax) {
        $this->nbJoueursMax = $nbJoueursMax;
    }


    
}
