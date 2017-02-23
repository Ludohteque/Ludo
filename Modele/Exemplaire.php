<?php

namespace Exemplaire;

	class Exemplaire {
		
		private $table = "Exemplaire";
		private $clePrimaire = "idExemplaire";
		
		private $idUser;
		private $idJeu;
		private $idExemplaire;
		private $commentaire;
		private $disponibilité;
		private $requette;
		
	}	
		function __construct($idJeu, $idExemplaire ,$commentaire, $disponibilité ){
			$this->jeu = $idJeu;
			$this->exemp = $idExemplaire;
			$this->com = $commentaire;
			$this->dispo = $disponibilité;
			
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

