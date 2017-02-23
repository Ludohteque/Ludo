<?php 
namespace User;

	class user{
		
		private $table = "user";
		private $clePrimaire = "idUser";
		
		private $idUser;
                private $pseudo;
		private $ville;
		private $mail;
		private $tel;
		private $mdp;
                private $noteUser;
		private $admin = false;
		private $bureau = false;
		
		
		function __construct($pseudo, $ville, $mail, $tel, $mdp, $noteUser) {
			$this->pseudo = $pseudo;
			$this->ville = $ville;
			$this->mail = $mail;
			$this->tel = $tel;
			$this->mdp = $mdp;
                        $this->noteUser = $noteUser;

		}
                function getUserById($Iduser) {
                    return $this->idUser;
                }		
		function getIdUserByPseudo($pseudo) {
                    return $this->idUser;			
		}

                function getUserByJeu($idJeu) {
                    return $this->idUser;
                }
                
		function  getIdUserVille() {
                    return $this->ville;
		}
		
		function getUserMAil() {
                    return $this->mail;
		}
		function getUserTelephone() {
                    return $this->tel;
		}
		function getUserMotDePasse() {
                    return $this->mdp;
		}
		function getUserIfAdmin() {
                    return $this->admin;
		}
		function getUserIfBureau() {
                    return $this->bureau;
		}
                function setUser($idUser) {
                    $this-> idUser = $idUser;
                }
                function setNoteUser($noteUser) {
                    $this->noteUser = $noteUser;
                }
        }


?>
