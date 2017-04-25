<?php
    class Duree {
        
        private $idDuree;
        private $dureeMin;
        private $dureeMax;
        private $listTranche;
        
        function __construct($idDuree, $dureeMin, $dureeMax) {
            $this->idDuree = $idDuree;
            $this->dureeMin = $dureeMax;
            $this->dureeMin = $dureeMin;
        }
        
        
        function getIdDuree() {
            return $this->idDuree;
            
        }              
        
        function getDureeMin() {
            return $this->dureeMin;
        }
        function getDureeMax() {
            return $this->dureeMax;
        }
        function getListTranche() {
            return $this->listTranche;
        }
        function setDureeMin($dureeMin) {
            $this->dureeMin = $dureeMin;
        }
        function setDureeMax($dureeMax) {
            $this->dureeMax = $dureeMax;
        }
        function setListTranche($listTranche) {
            $this->listTranche = $listTranche;
        }
    }