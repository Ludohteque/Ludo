<?php

class Age {
    
    private $table = "age";
    private $clePrimaire = "id_age";
    private $idAge;
    private $ageMin;
    private $ageMax;
    
    public function __construct($ageMin,$ageMax) {
        $req = "INSERT INTO ".$this->table." values('',".$ageMin.",".$ageMax.");";
        PdoLudo::$monPdo->exec($req);
    }
    

        
}