<?php

namespace Exemplaire;

	class Exemplaire {
		
		private $table = "Exemplaire";
		private $clePrimaire = "idExemplaire";
		
		private $idUser;
		private $idJeu;
		private $idExemplaire;
		private $commentaire;
		private $disponibilite;
		private $requette;
		
	}	
		function __construct($idJeu, $idExemplaire ,$commentaire, $disponibilite ){
			$this->idJeu = $idJeu;
			$this->idExemplaire = $idExemplaire;
			$this->commentaire = $commentaire;
			$this->disponibilite = $disponibilite;
			
		}
		function getUser() {
			return $this->user;
		}
		function getInfosJeuParId() {
			return $this->idJeu;
		}
		function getExemplaire() {
			return  $this->idExemplaire;
		}
		function getCommentaire() {
			return $this->commentaire;
		}
		function getDisponibilite() {
			return $this->disponibilite;			
		}
		
?>

