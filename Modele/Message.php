<?php

class Message {

    private $idMessage;
    private $corps;
    private $idExpediteur;
    private $idDestinataire;
    private $sujet;
    private $type;
    private $emprunt = false;
    private $ajout = false;
    private $signalement = false;
    
    function __construct($idMessage, $corps, $idExpediteur, $idDestinataire, $sujet, $type) {
        $this->idMessage = $idMessage;
        $this->corps = $corps;
        $this->idExpediteur = $idExpediteur;
        $this->idDestinataire = $idDestinataire;
        $this->sujet = $sujet;
        $this->type = $type;
    }

    function getIdMessage() {
        return $this->idMessage;
    }

    function getCorps() {
        return $this->corps;
    }

    function getIdExpediteur() {
        return $this->idExpediteur;
    }

    function getIdDestinataire() {
        return $this->idDestinataire;
    }

    function getSujet() {
        return $this->sujet;
    }

    function getType() {
        return $this->type;
    }
    function getEmprunt() {
	return $this->emprunt;
    }

    function getMessagesAjout() {
	return $this->ajout;
    }
    function getMessagesSignalement() {
	return $this->signalement;
    }

    function setIdMessage($idMessage) {
        $this->idMessage = $idMessage;
    }

    function setCorps($corps) {
        $this->corps = $corps;
    }

    function setIdExpediteur($idExpediteur) {
        $this->idExpediteur = $idExpediteur;
    }

    function setIdDestinataire($idDestinataire) {
        $this->idDestinataire = $idDestinataire;
    }

    function setSujet($sujet) {
        $this->sujet = $sujet;
    }

    function setType($type) {
        $this->type = $type;
    }


    
        
}
   
?>