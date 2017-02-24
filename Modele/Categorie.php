<?php

class Categorie {
   
    private $table = "Categorie";
    private $clePrimaire = "id_categorie";
    
    private $idCat;
    private $nomCat;
    
    function __construct($nomCat) {
        $this->nomCat = $nomCat;
    }

    function getIdCat() {
        return $this->idCat;
    }

    function getNomCat() {
        return $this->nomCat;
    }

    function setIdCat($idCat) {
        $this->idCat = $idCat;
    }

    function setNomCat($nomCat) {
        $this->nomCat = $nomCat;
    }


    
}

?>