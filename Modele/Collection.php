<?php

namespace collection;

class Collection {
    
    private $listTypeProduit;
    

    function __construct($listTypeProduit, $getListTypeProduit) {
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