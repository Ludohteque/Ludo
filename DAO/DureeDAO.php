<?php

class DureeDAO extends DAO {
  
    private $table = "duree";
    private $clePrimaire = "id_duree";
    
    protected function create($obj) {
        
        $dureeMin=$obj->getDureeMin();
    	$dureeMax=$obj->getDureeMax();
    	$listTranche=$obj->getListTranche();
        
        
        $req = Connexion::getInstance()->prepare("INSERT INTO ".$this->table." (dureeMin, dureeMax, listTranche) VALUES (?, ?, ?)");
       	$req->bindParam(1, $dureeMin);
    	$req->bindParam(2, $dureeMax);
    	$req->bindParam(3, $listTranche); 
        
    	$req->execute();
    }

    protected function delete($obj) {
        $id_duree=$obj->getIdDuree();
        
    	$req = Connexion::getInstance()->prepare("DELETE FROM ".$this->table." WHERE ".$this->clePrimaire." = ".$id_duree.";");
        $req->execute();
    }
    protected function find($id) {        
    	$req = Connexion::getInstance()->prepare("SELECT * FROM ".$this->table." WHERE ".$this->clePrimaire." = ".";");
        $req->execute();
    }

    protected function update($obj) {
        
 $stmt = Connexion::getInstance()->prepare("UPDATE ".$this->table." SET duree_min='?', duree_max='?', listTanche='?'  WHERE id='?' ; ");       
       	$req->bindParam(1, $dureeMin);
    	$req->bindParam(2, $dureeMax);
    	$req->bindParam(3, $listTranche);
        $stmt->bindParam(11, $obj->getId_duree());
        
        $req->execute();
        
    }

}




?>