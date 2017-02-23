<?php 
namespace Message;

	use User\user;
	
	class message {
		
		private $table = "message";
		private $cléPrimaire = "id_message";
		
		private $idMessage;
		private $corps;
		private $idExpediteur;
		private $idDestinataire;
		private $sujet;
		private $type;
		private $emprunt = false;
		private $ajout = false;
		private $signalement = false;
		
		function __construct($corps, $idExpediteur, $idDestinataire, $sujet ){
			$this->corps = $corps;
			$this->expe = $idExpediteur;
			$this->dest = $idDestinataire;
			$this->sujet = $sujet;
			
		}
		

		function getIdMessage() {
			return $this->idMessage;
		}
		function getCorps() {
			return $this->corps;
		}
		function getIdExpediteur() {
			return $this->idExpediteur;
		}
		function getIdDestinataire() {
			return $this->idDestinataire;
		}
		function getSujet() {
			return $this->sujet;
		}
		function getType() {
			return $this->type;
		}
		
		function getEmprunt() {
			$this-> emprunt = $emprunt;
			return $this->emprunt;
		}
		
		function getMessagesAjout() {
			$this-> ajout = $ajout;
			return $this->ajout;
		}
		function getMessagesSignalement() {
			$this-> sugnalement = $signalement;
			return $this->signalement;
		}
	}
	
?>