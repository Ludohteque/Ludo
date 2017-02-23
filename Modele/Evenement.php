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
    }
        
 ?>
