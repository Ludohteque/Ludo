<?php

class DureeDAO extends DAO {
  
    private $table = "duree";
    private $clePrimaire = "id_duree";
    
    public function create($obj) {
        
        $req = Connexion::getInstance()->prepare("INSERT INTO ".$this->table." (dureeMin, dureeMax) VALUES (?, ?)");
       	$req->bindParam(1, $obj->getDureeMin());
    	$req->bindParam(2, $obj->getDureeMax());
        
    	$req->execute();
    }

    public function delete($obj) {
        $id_duree=$obj->getIdDuree();
        
    	$req = Connexion::getInstance()->prepare("DELETE FROM ".$this->table." WHERE ".$this->clePrimaire." = ".$id_duree.";");
        $req->execute();
    }
    public function find($id) {        
    	$req = Connexion::getInstance()->prepare("SELECT * FROM ".$this->table." WHERE ".$this->clePrimaire." = ".$id.";");
        $req->execute();
        
    }

    public function update($obj) {
        
        $stmt = Connexion::getInstance()->prepare("UPDATE ".$this->table." SET duree_min='?', duree_max='?'  WHERE id='?' ; ");       
       	$stmt->bindParam(1, $obj->getDureeMin());
    	$stmt->bindParam(2, $obj->getDureeMax());
        $stmt->bindParam(3, $obj->getIdDuree());
        
        $stmt->execute();
        
    }

}




?>