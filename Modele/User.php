<?php


class User {    
    

        private $idUser;
	private $pseudo;
	private $ville;
	private $mail;
	private $tel;
	private $isAdmin;
	private $mdp;
	private $isBureau;
        private $moyenne;
        private $nbBan;
        private $enBan;
        private $nb_notes;
	
	function __construct($idUser, $pseudo, $ville, $mail, $tel, $isAdmin, $isBureau, $mdp, $moyenne, $nbBan, $enBan, $nb_notes) {
                $this->id_user = $idUser;
		$this->pseudo = $pseudo;
		$this->ville = $ville;
		$this->mail = $mail;
		$this->tel = $tel;
                $this->isAdmin = $isAdmin;
                $this->isBureau = $isBureau;
		$this->mdp = $mdp;
                $this->moyenne = $moyenne;
                $this->nbBan = $nbBan;
                $this->enBan = $enBan;
                $this->nb_notes = $nb_notes;
		
	}
	function getIdUser() {
            return $this->id_user;
        }

        function getPseudo() {
            return $this->pseudo;
        }

        function getVille() {
            return $this->ville;
        }

        function getMail() {
            return $this->mail;
        }

        function getTel() {
            return $this->tel;
        }

        function IsAdmin() {
            return $this->isAdmin;
        }

        function getMdp() {
            return $this->mdp;
        }

        function IsBureau() {
            return $this->isBureau;
        }

        function getMoyenne() {
            return $this->moyenne;
        }

        function getNbBan() {
            return $this->nbBan;
        }

        function getEnBan() {
            return $this->enBan;
        }
        function getNbNotes() {
            return $this->nb_notes;
        }

        function setIdUser($idUser) {
            $this->idUser = $idUser;
        }

        function setPseudo($pseudo) {
            $this->pseudo = $pseudo;
        }

        function setVille($ville) {
            $this->ville = $ville;
        }

        function setMail($mail) {
            $this->mail = $mail;
        }

        function setTel($tel) {
            $this->tel = $tel;
        }

        function setIsAdmin($isAdmin) {
            $this->isAdmin = $isAdmin;
        }

        function setMdp($mdp) {
            $this->mdp = $mdp;
        }

        function setIsBureau($isBureau) {
            $this->isBureau = $isBureau;
        }

        function setMoyenne($moyenne) {
            $this->moyenne = $moyenne;
        }

        function setNbBan($nbBan) {
            $this->nbBan = $nbBan;
        }

        function setEnBan($enBan) {
            $this->enBan = $enBan;
        }


	
}

?>
