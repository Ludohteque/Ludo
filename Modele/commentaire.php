<?php

class Commentaire {
    
    private $table = "commentaire";
    private $clePrimaire = "id_comm";
    private $idComm;
    private $commentaire;
    private $idJeu;
    
    public function __contrast ($commentaire, $idJeu) {
        $req = "INSERT INTO ".$this->table." values('',".$commentaire.",".$idJeu.");";
        PdoLudo::$monPdo->exec($req);
    }

    
    
}

?>