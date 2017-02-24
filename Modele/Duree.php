<?php

namespace duree;

    class duree {
        
        private $table = "duree";
        private $clePrimaire = "id_duree";
        
        private $idDuree;
        private $dureeMin;
        private $dureeMax;
        private $listTranche;
        
        function __construct($dureeMin, $dureeMax, $listTranche) {
            $this->dureeMin = $dureeMax;
            $this->dureeMin = $dureeMin;
            $this->listTranche = $listTranche;
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