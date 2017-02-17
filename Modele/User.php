<?php 
namespace User;

	class user{
		
		private $table = "use";
		private $clePrimaire = "pseudo";
		
		private $pseudo;
		private $ville;
		private $mail;
		private $tel;
		private $mdp;
		private $admin = false;
		private $bureau = false;
		
		
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
		
		function  getIdUserVille() {
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
			$this->admin=true;
		}
		function getIdUserIfBureau() {
			$this->bureau=true;
		}
}	
?>
