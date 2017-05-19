<?php
    
    class Evenement {
        
        private $idEvenement;
        private $evenement;
        private $lienImage;
        private $titre;
        private $dateajout;
        
        
        function __construct($idEvenement, $evenement, $lienImage, $titre, $dateajout) {
            $this->idEvenement = $idEvenement;
            $this->evenement = $evenement;
            $this->lienImage = $lienImage;
            $this->titre = $titre;
            $this->dateajout = $dateajout;
        
        }
        
        public function getTitre(){
            return $this->titre;
        }    
        
        public function getDateAjout(){
            return $this->dateajout;
        } 
        
        function getIdEvenement() {
            return $this->idEvenement;
        }

        function getEvenement() {
            return $this->evenement;
        }

        function getLienImage() {
            return LIEN_IMAGE."evenement/".$this->lienImage."";
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
        
        public function transfoDateEvenement($id) {
            
        }
    
    }
        
 ?>
