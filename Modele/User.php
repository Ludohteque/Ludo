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
        private $noteUser;
        private $nbBan;
        private $enBan;
	
	function __construct($idUser, $pseudo, $ville, $mail, $tel, $isAdmin, $isBureau, $mdp, $noteUser, $nbBan, $enBan) {
                $this->idUser = $idUser;
		$this->pseudo = $pseudo;
		$this->ville = $ville;
		$this->mail = $mail;
		$this->tel = $tel;
                $this->isAdmin = $isAdmin;
                $this->isBureau = $isBureau;
		$this->mdp = $mdp;
                $this->noteUser = $noteUser;
                $this->nbBan = $nbBan;
                $this->enBan = $enBan;
		
	}
	function getIdUser() {
            return $this->idUser;
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

        function getNoteUser() {
            return $this->noteUser;
        }

        function getNbBan() {
            return $this->nbBan;
        }

        function getEnBan() {
            return $this->enBan;
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

        function setNoteUser($noteUser) {
            $this->noteUser = $noteUser;
        }

        function setNbBan($nbBan) {
            $this->nbBan = $nbBan;
        }

        function setEnBan($enBan) {
            $this->enBan = $enBan;
        }


	
}

?>
