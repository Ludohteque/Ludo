<?php

class Exemplaire {

    private $idUser;
    private $idJeu;
    private $idExemplaire;
    private $etat;
    private $disponibilite;

    function __construct($idExemplaire, $idJeu, $idUser, $etat, $disponibilite) {

        $this->idExemplaire = $idExemplaire;
        $this->idJeu = $idJeu;
        $this->idUser = $idUser;
        $this->commentaire = $etat;
        $this->disponibilite = $disponibilite;
    }

    

    function getIdUser() {
        return $this->idUser;
    }

    function getIdJeu() {
        return $this->idJeu;
    }

    function getIdExemplaire() {
        return $this->idExemplaire;
    }

    function getEtat() {
        return $this->etat;
    }
    
    function getDisponibilite() {
        return $this->disponibilite;
    }

    function setIdUser($idUser) {
        $this->idUser = $idUser;
    }

    function setIdJeu($idJeu) {
        $this->idJeu = $idJeu;
    }

    function setIdExemplaire($idExemplaire) {
        $this->idExemplaire = $idExemplaire;
    }

    function setEtat($etat) {
        $this->etat = $etat;
    }

}
?>

