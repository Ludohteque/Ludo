<?php

class categorie {
    
    private $idCat;
    private $nomCat;
    private $table = "Categorie";
    private $clePrimaire = "id_categorie";
    
    function __construct ($nomCat) {
        $req = "INSERT INTO ".$this->table." values('',".$nomCat.");";
        PdoLudo::$monPdo->exec($req);
    }
    
    function lireCatId ($idcatenv) {
        $req = "SELECT ".$nomcat." FROM ".$table." WHERE ".$idcat." LIKE ".$idcatenv.";";
        PdoLudo::$monPdo->exec($req);
    }
    
}

?>