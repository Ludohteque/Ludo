<?php

class Categorie {
   
    private $table = "categorie";
    private $clePrimaire = "nom_categorie";

    private $nomCat;
    
    function __construct($nomCat) {
        $this->nomCat = $nomCat;
    }

    function getNomCat() {
        return $this->nomCat;
    }

    function setNomCat($nomCat) {
        $this->nomCat = $nomCat;
    }


    
}

?>