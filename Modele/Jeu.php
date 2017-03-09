<?php
require_once('Modele/Produit.php');

class Jeu extends Produit {

    
        //attributs
	private $idJeu;
	private $nbJoueurs;
	private $idAge;
        private $idDuree;
        private $lesCommentaires;
        
        function __construct($idJeu, $nomJeu, $descriptif, $etat, $note, $dateAjout, $image, $nbJoueurs, $idAge, $idDuree) {
            parent::__construct($idJeu, $nomJeu, $descriptif, $etat, $note, $dateAjout, $image);
            $this->nbJoueurs = $nbJoueurs;
            $this->idAge = $idAge;
            $this->idDuree = $idDuree;
            
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



}

?>
