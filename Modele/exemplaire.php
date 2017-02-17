<?php

namespace Exemplaire;

	class Exemplaire {
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
		function user() {
			return $this->user;
		}
		function jeu() {
			return $this->jeu;
		}
		function exemplaire() {
			return  $this->exemp;
		}
		function commentaire() {
			return $this->com;
		}
		function disponibilite() {
			return $this->dispo;			
		}
		
?>
