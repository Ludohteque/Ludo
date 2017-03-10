<?php

class NombreJoueursDAO extends DAO {
  
    private $table = "nbjoueur";
    private $clePrimaire = "id_nb_joueur";
    
    public function create($obj) {
        
        $req = Connexion::getInstance()->prepare("INSERT INTO ".$this->table." (nb_joueur_min, nb_joueur_max) VALUES (?, ?)");
       	$req->bindParam(1, $obj->getNbjMin());
    	$req->bindParam(2, $obj->getNbjMax());
        
    	$req->execute();
    }

    public function delete($obj) {
        $id_nbj=$obj->getIdNbj();
        
    	$req = Connexion::getInstance()->prepare("DELETE FROM ".$this->table." WHERE ".$this->clePrimaire." = ".$id_nbj.";");
        $req->execute();
    }
    public function find($id_nbj) {        
    	$req = Connexion::getInstance()->prepare("SELECT * FROM ".$this->table." WHERE ".$this->clePrimaire." = ".$id_nbj.";");
        $req->execute();
        $d = $req->fetch();
        $duree=new Nbjjoueurs($d["id_nb_joueur"], $d["nb_joueur_min"], $d["nb_joueur_max"]);
            
        return $duree;
        
    }

    public function update($obj) {
        $nbjMin = $obj->getNbjMin();
        $nbjMax = $obj->getNbjMax();
        $idNbj = $obj->getIdNbj();
        
        $stmt = Connexion::getInstance()->prepare("UPDATE ".$this->table." SET duree_min='?', duree_max='?'  WHERE id='?' ; ");       
       	$stmt->bindParam(1, $nbjMin);
    	$stmt->bindParam(2, $nbjMax);
        $stmt->bindParam(3, $idNbj);
        
        $stmt->execute();
        
    }

}