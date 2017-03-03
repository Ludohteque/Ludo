<?php

class Commentaire {

    private $idCommentaire;
    private $commentaire;
    private $idJeu;
    private $idUser;

    function __construct($idCommentaire, $commentaire, $idJeu, $idUser) {

        $this->idCommentaire = $idCommentaire;
        $this->commentaire = $commentaire;
        $this->id_jeu = $idJeu;
        $this->id_user = $idUser;
    }
    
    
    function getIdCommentaire() {
        return $this->idCommentaire;
    }

    function setIdCommentaire($idCommentaire) {
        $this->idCommentaire = $idCommentaire;
    }

    function getCommentaire() {
        return $this->commentaire;
    }
    
    function setCommentaire($commentaire) {
        $this->commentaire = $commentaire;
    }

    function getIdJeu() {
        return $this->idJeu;
    }
    
    function setIdJeu($idJeu) {
        $this->idJeu = $idJeu;
    }

    function getIdUser() {
        return $this->idUser;
    }

    function setIdUser($idUser) {
        $this->idUser = $idUser;
    }
}

?>