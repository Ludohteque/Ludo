<?php

class Commentaire extends Jeu {
    
    private $table = "Commentaire";
    private $clePrimaire = "id_comm";
    
    private $id_comm;
    private $commentaire;
    private $id_jeu;
    private $id_user;
    
    function __construct($commentaire, $idJeu, $idUser) {
        $this->commentaire = $commentaire;
        $this->id_jeu = $id_jeu;
        $this->id_user = $id_user;
    }

    function getIdComm() {
        return $this->idComm;
    }

    function getCommentaire() {
        return $this->commentaire;
    }

    function getIdJeu() {
        return $this->id_jeu;
    }

    function getIdUser() {
        return $this->id_user;
    }

    function setIdComm($idComm) {
        $this->idComm = $idComm;
    }

    function setCommentaire($commentaire) {
        $this->commentaire = $commentaire;
    }

    function setIdJeu($idJeu) {
        $this->id_jeu = $id_jeu;
    }

    function setIdUser($idUser) {
        $this->id_user = $id_user;
    }


    

    
    
}

?>