<?php

class MessageDAO extends DAO {
    private $table = "message";
    private $clePrimaire = "id_message";
        
    protected function create($obj) {

        $corps=$obj->getCorps();
    	$idExpediteur=$obj->getIdExpediteur();
    	$idDestinataire=$obj->getIdDestinataire();
    	$sujet=$obj->getSujet();
    	$type=$obj->getType();        
        
        $req = execute();
        
    	$req = Connexion::getInstance()->prepare("INSERT INTO ".$this->table." (corps, idExpediteur, idDestinataire, sujet, type) VALUES (?, ?, ?, ?, ?)");
       	$req->bindParam(1, $corps);
    	$req->bindParam(2, $idExpediteur);
    	$req->bindParam(3, $idDestinataire);
    	$req->bindParam(4, $sujet);
    	$req->bindParam(5, $type);
    	
    	$req->execute();
    }

    protected function delete($obj) {
        $idMessage=$obj->getIdMessage();
        
    	$req = Connexion::getInstance()->prepare("DELETE FROM ".$this->table." WHERE ".$this->clePrimaire." = ".$idMessage.";");
        $req->execute();
    }
    protected function find($obj) {
        
    	$req = Connexion::getInstance()->prepare("SELECT * FROM ".$this->table." WHERE ".$this->clePrimaire." = ".";");
        $req->execute();
    }

    protected function update($obj) {
        
        $idMessage=$obj->getIdMessage();        
    	$req = Connexion::getInstance()->prepare("UPDATE FROM ".$this->table." WHERE ".$this->clePrimaire." = ".$idMessage.";");
        $req->execute();
        
    }
    

}
?>