<?php

namespace type;

class Type {
    
    private $listTypeProduit;
    

    function __construct($listTypeProduit, $getListTypeProduit) {
        $this->listTypeProduit = $listTypeProduit;
        $this->listTypeProduit = $getListTypeProduit;        
    }
    
    function getlistTypeProduit() {
        return $this->ListTypeProduit;
    }
    function setlistTypeProduit($listTypeProduit) {
        $this->listTypeProduit = $listTypeProduit;
    }
    
    
}

?>