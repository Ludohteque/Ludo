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
                $this->id_user = $idUser;
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
	function getIdUserParPseudo() {
		return $this->pseudo;
	}
	
	function getIdUserVille() {
		return $this->ville;
	}
	
	function getIdUserMAil() {
		return $this->mail;
	}
	
	function getIdUserTelephone() {
		return $this->tel;
	}
	
	function getIdUserMotDePasse() {
		return $this->mdp;
	}
	
	function getIdUserIfAdmin() {
		return $this->admin;
	}
	
	function getIdUserIfBureau() {
		return $this->bureau;
	}
	
	public function getPseudo() {
		return $this->pseudo;
	}
	
	public function setPseudo($pseudo) {
		$this->pseudo = $pseudo;
		return $this;
	}
	
	public function getVille() {
		return $this->ville;
	}
	
	public function setVille($ville) {
		$this->ville = $ville;
		return $this;
	}
	
	public function getMail() {
		return $this->mail;
	}
	
	public function setMail($mail) {
		$this->mail = $mail;
		return $this;
	}
	
	public function getTel() {
		return $this->tel;
	}
	public function setTel($tel) {
		$this->tel = $tel;
		return $this;
	}
	public function getMdp() {
		return $this->mdp;
	}
	public function setMdp($mdp) {
		$this->mdp = $mdp;
		return $this;
	}
	public function IsAdmin() {
		return $this->isAdmin;
	}
	public function setIsAdmin($isAdmin) {
		$this->isAdmin = $isAdmin;
		return $this;
	}
	public function IsBureau() {
		return $this->isBureau;
	}
	public function setIsBureau($isBureau) {
		$this->isBureau = $isBureau;
		return $this;
	}
	
	function getIdUser() {
        return $this->id_user;
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

        function setIdUser($id_user) {
            $this->id_user = $id_user;
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
