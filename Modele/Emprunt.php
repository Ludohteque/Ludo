<?php
namespace emprunt;

    class emprunt {
        
        
        private $idEmprunts;
        private $dateEmprunts;
        private $dateRemise;
        private $idEmprunteur;
        private $idExemplaire;
        
        function __construct($idEmprunts, $dateEmprunts, $dateRemise, $idEmprunteur, $idExemplaire) {
            
            $this->idEmprunts = $idEmprunts;
            $this->dateEmprunts = $dateEmprunts;
            $this->dateRemise = $dateRemise;
            $this->idEmprunteur = $idEmprunteur;
            $this->idExemplaire = $idExemplaire;    
        }
        
        
        function getIdEmprunts() {
            return $this->idEmprunts;
        }

        function getDateEmprunts() {
            return $this->dateEmprunts;
        }

        function getDateRemise() {
            return $this->dateRemise;
        }

        function getIdEmprunteur() {
            return $this->idEmprunteur;
        }

        function getIdExemplaire() {
            return $this->idExemplaire;
        }

        function setIdEmprunts($idEmprunts) {
            $this->idEmprunts = $idEmprunts;
        }

        function setDateEmprunts($dateEmprunts) {
            $this->dateEmprunts = $dateEmprunts;
        }

        function setDateRemise($dateRemise) {
            $this->dateRemise = $dateRemise;
        }

        function setIdEmprunteur($idEmprunteur) {
            $this->idEmprunteur = $idEmprunteur;
        }

        function setIdExemplaire($idExemplaire) {
            $this->idExemplaire = $idExemplaire;
        }


    }
    
    ?>
