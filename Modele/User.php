<?php

namespace User;

class user {
	private $table = "user";
	private $clePrimaire = "pseudo";
	private $pseudo;
	private $ville;
	private $mail;
	private $tel;
	private $mdp;
	private $isAdmin = false;
	private $isBureau = false;
	
	function __construct($pseudo, $ville, $mail, $tel, $mdp) {
		$this->pseudo = $pseudo;
		$this->ville = $ville;
		$this->mail = $mail;
		$this->tel = $tel;
		$this->mdp = $mdp;
		
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
	public function getIsAdmin() {
		return $this->isAdmin;
	}
	public function setIsAdmin($isAdmin) {
		$this->isAdmin = $isAdmin;
		return $this;
	}
	public function getIsBureau() {
		return $this->isBureau;
	}
	public function setIsBureau($isBureau) {
		$this->isBureau = $isBureau;
		return $this;
	}
	
	
	
}

?>
