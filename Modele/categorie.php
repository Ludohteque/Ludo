<?php

class categorie {
    
    private $idCat;
    private $nomCat;
    private $table = "Categorie";
    private $clePrimaire = "id_categorie";
    
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