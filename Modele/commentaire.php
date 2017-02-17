<?php

class Commentaire {
    
    private $table = "commentaire";
    private $clePrimaire = "id_comm";
    
    private $idComm;
    private $commentaire;
    private $idJeu;
    private $idUser;
    
    function __construct($commentaire, $idJeu, $idUser) {
        $this->commentaire = $commentaire;
        $this->idJeu = $idJeu;
        $this->idUser = $idUser;
    }

    function getIdComm() {
        return $this->idComm;
    }

    function getCommentaire() {
        return $this->commentaire;
    }

    function getIdJeu() {
        return $this->idJeu;
    }

    function getIdUser() {
        return $this->idUser;
    }

    function setIdComm($idComm) {
        $this->idComm = $idComm;
    }

    function setCommentaire($commentaire) {
        $this->commentaire = $commentaire;
    }

    function setIdJeu($idJeu) {
        $this->idJeu = $idJeu;
    }

    function setIdUser($idUser) {
        $this->idUser = $idUser;
    }


    

    
    
}

?>