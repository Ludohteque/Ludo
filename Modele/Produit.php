<?php

class Produit {
    
    
    protected $idProduit;
    protected $nom;
    protected $note;
    protected $descriptif;
    protected $isValide;
    protected $etat;
    protected $dateAjout;

    function __construct($id, $nom, $descriptif, $etat, $note, $dateAjout) {
        $this->idProduit = $id;
        $this->nom = $nom;
        $this->descriptif = $descriptif;
        $this->etat = $etat;
        $this->note = $note;
        $this->dateAjout = $dateAjout;
    }

    function getIdProduit() {
        return $this->idProduit;
    }

    function setIdProduit($idProduit) {
        $this->idProduit = $idProduit;
    }
        
    function getNom() {
        return $this->nom;
    }

    function getNote() {
        return $this->note;
    }

    function getDescriptif() {
        return $this->descriptif;
    }

    function getIsValide() {
        return $this->isValide;
    }

    function getEtat() {
        return $this->etat;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setNote($note) {
        $this->note = $note;
    }

    function setDescriptif($descriptif) {
        $this->descriptif = $descriptif;
    }

    function setIsValide($isValide) {
        $this->isValide = $isValide;
    }

    function setEtat($etat) {
        $this->etat = $etat;
    }


    
    
}
?>