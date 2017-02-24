<?php
namespace emprunt;

    class emprunt {
        
        private $table = "emprunt";
        private $clePrimaire = "id_emprunts";
        
        private $id_emprunts;
        private $date_emprunts;
        private $date_remise;
        private $id_emprunteur;
        private $id_exemplaire;
        
        function __construct($date_emprunts, $date_remise, $id_emprunteur, $id_exemplaire) {
            $this->date_emprunts = $date_emprunts;
            $this->date_remise = $date_remise;
            $this->id_emprunteur = $id_emprunteur;
            $this->id_exemplaire = $id_exemplaire;           ;
        }
        function getId_emprunts() {
            return $this->id_emprunts;
        }

        function setId_emprunts($id_emprunts) {
            $this->id_emprunts = $id_emprunts;
        }

                function getDateEmprunt() {
            return $this->date_emprunts;
        }
        function getDateRemise() {
            return $this->date_remise;
        }
        function getIdEmprunteur() {
            return $this->id_emprunteur;
        }
        function getIdExemplaire() {
            return $this->id_exemplaire;
        }
        function setDateEmprunt($id_emprunts) {
            $this->id_emprunts = $id_emprunts;
        }
        function setDateRemise($date_remise) {
            $this->date_remise = $date_remise;
        }
        function setIdEmprunteur($id_emprunteur) {
            $this->id_emprunteur = $id_emprunteur;
        }
        function setIdExemplaire($IdExemplaire) {
            $this->id_exemplaire = $IdExemplaire;
        }
    }
    
    ?>
