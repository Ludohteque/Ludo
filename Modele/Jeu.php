<?php

class Jeu extends Produit {

    
        //attributs
	private $idJeu;
	private $nbJoueurs;
	private $idAge;
	private $idCat;
        private $idDuree;
        private $dateAjout;
        private $lesCommentaires;
        
        function __construct($idJeu, $nomJeu, $nbJoueurs, $idAge, $idCat, $descriptif, $idDuree, $dateAjout, $etat, $note) {
            parent::__construct($idJeu, $nomJeu, $descriptif, $etat, $note, $dateAjout);
            $this->nbJoueurs = $nbJoueurs;
            $this->idAge = $idAge;
            $this->idCat = $idCat;
            $this->idDuree = $idDuree;
            
        }
        

        function getIdJeu() {
            return $this->idJeu;
        }

        function getNomJeu() {
            return $this->nomJeu;
        }

        function getNbJoueurs() {
            return $this->nbJoueurs;
        }

        function getIdAge() {
            return $this->idAge;
        }

        function getNote() {
            return $this->note;
        }

        function getIdCat() {
            return $this->idCat;
        }

        function getDescriptif() {
            return $this->descriptif;
        }

        function getEstValide() {
            return $this->estValide;
        }

        function getInventaire() {
            return $this->inventaire;
        }

        function getIdDuree() {
            return $this->idDuree;
        }

        function getDateAjout() {
            return $this->dateAjout;
        }
        function getLesCommentaires() {
            return $this->lesCommentaires;
        }

        function setLesCommentaires($lesCommentaires) {
            $this->lesCommentaires = $lesCommentaires;
        }

        function setIdJeu($idJeu) {
            $this->idJeu = $idJeu;
        }

        function setNomJeu($nomJeu) {
            $this->nomJeu = $nomJeu;
        }

        function setNbJoueurs($nbJoueurs) {
            $this->nbJoueurs = $nbJoueurs;
        }

        function setIdAge($idAge) {
            $this->idAge = $idAge;
        }

        function setNote($note) {
            $this->note = $note;
        }

        function setIdCat($idCat) {
            $this->idCat = $idCat;
        }

        function setDescriptif($descriptif) {
            $this->descriptif = $descriptif;
        }

        function setEstValide($estValide) {
            $this->estValide = $estValide;
        }

        function setInventaire($inventaire) {
            $this->inventaire = $inventaire;
        }

        function setIdDuree($idDuree) {
            $this->idDuree = $idDuree;
        }

        function setDateAjout($dateAjout) {
            $this->dateAjout = $dateAjout;
        }

}

?>
