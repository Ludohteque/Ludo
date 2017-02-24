<?php

class MessageDAO extends DAO {
    private $table = "message";
    private $clePrimaire = "id_message";
        
    protected function create($obj) {
        
        $messagte=$obj->getMessage();
    	$stmt = Connexion::getInstance()->prepare("INSERT INTO ".$this->table." (corps, idExpediteur, idDestinataire, sujet, type) VALUES (?,)");
    	
    	$stmt->bindParam(1, $corps);
    	$stmt->bindParam(2, $idExpediteur);
    	$stmt->bindParam(3, $idDestinataire);
    	$stmt->bindParam(4, $sujet);
    	$stmt->bindParam(5, $type);
    	
    	$stmt->execute();
    }

    protected function delete($obj) {
        $req = "delete from ".$this->table." where ".$this->clePrimaire." = ".$obj->getMessage().";";
        PdoLudo::$monPdo->execute($req);        
    }

    protected function find($obj) {
        $req = "select * from ".$this->table." where ".$this->clePrimaire." = ".$obj->getMessage().";";
        PdoLudo::$monPdo->execute($req);         
    }

    protected function update($obj) {
        $req = "update from ".$this->table." where ".$this->clePrimaire." = ".$obj->getMessage().";";
        PdoLudo::$monPdo->execute($req);         
    }
    

}
?>