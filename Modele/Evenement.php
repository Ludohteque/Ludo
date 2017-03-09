<?php

    
    class Evenement {
        
        private $idEvenement;
        private $evenement;
        private $lienImage;
        
        
        function __construct($idEvenement, $evenement, $lienImage) {
            $this->idEvenement = $idEvenement;
            $this->evenement = $evenement;
            $this->lienImage = $lienImage;
        
        }
        
        function getIdEvenement() {
            return $this->idEvenement;
        }

        function getEvenement() {
            return $this->evenement;
        }

        function getLienImage() {
            return $this->lienImage;
        }

        function setIdEvenement($idEvenement) {
            $this->idEvenement = $idEvenement;
        }

        function setEvenement($evenement) {
            $this->evenement = $evenement;
        }

        function setLienImage($lienImage) {
            $this->lienImage = $lienImage;
        }


        }
        
 ?>
