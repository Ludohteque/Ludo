<?php

namespace evenement;
    
    class evenement {
        
        private $table = "evenement";
        private $clePrimaire = "id_evenement";
        
        private $evenement;
        private $lienImage;
        private $idEvenement;
        
        function __construct($evenement, $lienImage) {
            $this->evenement = $evenement;
            $this->lienImage = $lienImage;
        
        }
        function getEvenement() {
            return $this->evenement;
        }

        function getLienImage() {
            return $this->lienImage;
        }

        function getIdEvenement() {
            return $this->idEvenement;
        }

        function setEvenement($evenement) {
            $this->evenement = $evenement;
        }

        function setLienImage($lienImage) {
            $this->lienImage = $lienImage;
        }

        function setIdEvenement($idEvenement) {
            $this->idEvenement = $idEvenement;
        }


        
        }
        
 ?>
