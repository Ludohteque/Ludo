<?php

    class NombreJoueurs {
        
        private $idNbj;
        private $nbjMin;
        private $nbjMax;
        
        function __construct($idNbj, $nbjMin, $nbjMax) {
            $this->idNbj = $idNbj;
            $this->nbjMin = $nbjMin;
            $this->nbjMin = $nbjMax;
        }
        
        
        function getIdNbj() {
            return $this->idNbj;
            
        }              
        
        function getNbjMin() {
            return $this->nbjMin;
        }
        function getNbjMax() {
            return $this->nbjMax;
        }
        
        function setNbjMin($nbjMin) {
            $this->nbjMin = $nbjMin;
        }
        function setNbjMax($nbjMax) {
            $this->nbjMax = $nbjMax;
        }

    }