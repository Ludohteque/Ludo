<?php

class Jeu {

    
        private $table = "jeu";
        private $clePrimaire = "id_jeu";
        
        //attributs
	private $idJeu;
	private $nomJeu;
	private $nbJoueurs;
	private $idAge;
	private $note;
	private $idCat;
	private $descriptif;
	private $estValide;
        private $inventaire;
        private $idDuree;
        private $dateAjout;
        
        function __construct($nomJeu, $nbJoueurs, $idAge, $note, $idCat, $descriptif, $inventaire, $idDuree, $dateAjout) {
            $this->nomJeu = $nomJeu;
            $this->nbJoueurs = $nbJoueurs;
            $this->idAge = $idAge;
            $this->note = $note;
            $this->idCat = $idCat;
            $this->descriptif = $descriptif;
            $this->inventaire = $inventaire;
            $this->idDuree = $idDuree;
            $this->dateAjout = $dateAjout;
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