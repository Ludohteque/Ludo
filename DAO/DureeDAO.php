<?php

require_once 'Modele/Duree.php';

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
        $d = $req->fetch();
        $duree=new Duree($d["id_duree"], $d["duree_min"], $d["duree_max"]);
            
        return $duree;
        
    }

    public function update($obj) {
        $dureeMin = $obj->getDureeMin();
        $dureeMax = $obj->getDureeMax();
        $idDuree = $obj->getIdDuree();
        
        $stmt = Connexion::getInstance()->prepare("UPDATE ".$this->table." SET duree_min='?', duree_max='?'  WHERE id='?' ; ");       
       	$stmt->bindParam(1, $dureeMin);
    	$stmt->bindParam(2, $dureeMax);
        $stmt->bindParam(3, $idDuree);
        
        $stmt->execute();
        
    }

}




?>