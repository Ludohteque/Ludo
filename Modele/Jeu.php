<?php
require_once('Modele/Produit.php');

class Jeu extends Produit {

    
        //attributs
        
	private $idJeu;
	private $nbJoueurs;
	private $idAge;
        private $idDuree;
        private $lesCommentaires;
        private $lesCategories;
        
        function __construct($idJeu, $nomJeu, $descriptif, $etat, $note, $dateAjout, $image, $nbJoueurs, $idAge, $idDuree, $lesCategories) {
            parent::__construct($idJeu, $nomJeu, $descriptif, $etat, $note, $dateAjout, $image);
            $this->idJeu = $idJeu;
            $this->nbJoueurs = $nbJoueurs;
            $this->idAge = $idAge;
            $this->idDuree = $idDuree;
            $this->lesCategories = $lesCategories;
            
        }
        
        function getnomJeu() {
            return parent::getNom();
        }
        
        function getNote() {
            return parent::getNote();
        }
        
        function getIdJeu() {
            return $this->idJeu;
        }

        function getNbJoueurs() {
            return $this->nbJoueurs;
        }

        function getIdAge() {
            return $this->idAge;
        }

        function getIdDuree() {
            return $this->idDuree;
        }

        function getLesCommentaires() {
            return $this->lesCommentaires;
        }

        function setIdJeu($idJeu) {
            $this->idJeu = $idJeu;
        }

        function setNbJoueurs($nbJoueurs) {
            $this->nbJoueurs = $nbJoueurs;
        }

        function setIdAge($idAge) {
            $this->idAge = $idAge;
        }

        function setIdDuree($idDuree) {
            $this->idDuree = $idDuree;
        }

        function setLesCommentaires($lesCommentaires) {
            $this->lesCommentaires = $lesCommentaires;
        }
        
        function getLesCategories() {
            return $this->lesCategories;
        }

        function setLesCategories($lesCategories) {
            $this->lesCategories = $lesCategories;
        }




}

?>
