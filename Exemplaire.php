<?php

namespace Exemplaire;
	class Exemplaire {
		
		private $table = "exemplaire";
		private $clePrimaire = "idExemplaire";
		
		private $idUser;
		private $idJeu;
		private $idExemplaire;
		private $commentaire;
		private $disponibilit�;
		private $requette;
		
	}	
		function __construct($idJeu, $idExemplaire ,$commentaire, $disponibilit� ){
			$this->jeu = $idJeu;
			$this->exemp = $idExemplaire;
			$this->com = $commentaire;
			$this->dispo = $disponibilit�;
			
		}
		function getUser() {
			return $this->user;
		}
		function getInfosJeuParId() {
			return $this->jeu;
		}
		function getExemplaire() {
			return  $this->exemp;
		}
		function getCommentaire() {
			return $this->com;
		}
		function getDisponibilite() {
			return $this->dispo;			
		}
		
?>
