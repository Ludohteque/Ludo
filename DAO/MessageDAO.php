<?php

class MessageDAO extends DAO {
    private $table = "message";
    private $clePrimaire = "id_message";
        
    public function create($obj) {

        $corps=$obj->getCorps();
    	$idExpediteur=$obj->getIdExpediteur();
    	$idDestinataire=$obj->getIdDestinataire();
    	$sujet=$obj->getSujet();
    	$type=$obj->getType();
        
    	$req = Connexion::getInstance()->prepare("INSERT INTO ".$this->table." (corps, idExpediteur, idDestinataire, sujet, type) VALUES (?, ?, ?, ?, ?)");
       	$req->bindParam(1, $corps);
    	$req->bindParam(2, $idExpediteur);
    	$req->bindParam(3, $idDestinataire);
    	$req->bindParam(4, $sujet);
    	$req->bindParam(5, $type);
    	
    	$req->execute();
    }

    public function delete($obj) {
        $idMessage=$obj->getIdMessage();
        
    	$req = Connexion::getInstance()->prepare("DELETE FROM ".$this->table." WHERE ".$this->clePrimaire." = ".$idMessage.";");
        $req->execute();
    }
    public function find($id) {
        
    	$req = Connexion::getInstance()->prepare("SELECT * FROM ".$this->table." WHERE ".$this->clePrimaire." = ".$id.";");
        $req->execute();
        $d = $req->fetch();
        $message=new Message($d["id_message"], $d["corps"], $d["id_expediteur"], $d["id_destinataire"], $d["sujet"], $d["type"]);
            
        return $message;
    }

    public function update($obj) {
        
        $corps=$obj->getCorps();
    	$idExpediteur=$obj->getIdExpediteur();
    	$idDestinataire=$obj->getIdDestinataire();
    	$sujet=$obj->getSujet();
    	$type=$obj->getType();
        $idMessage=$obj->getIdMessage();
               
        $stmt = Connexion::getInstance()->prepare("UPDATE ".$this->table." SET corps='?', idExpediteur='?', idDestinataire='?', sujet='?',"
                . "type='? WHERE id='?' ; ");     
        
        $stmt->bindParam(1, $corps);
    	$stmt->bindParam(2, $idExpediteur);
    	$stmt->bindParam(3, $idDestinataire);
    	$stmt->bindParam(4, $sujet);
    	$stmt->bindParam(5, $type);
        $stmt->bindParam(6, $idMessage);
        
        $stmt->execute();
        
    }
    

}
?>