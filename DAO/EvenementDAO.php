<?php

class EvenementDAO extends DAO {
    
    private $table = "evenement";
    private $clePrimaire = "id_evenement";
    
    protected function create($obj) {
    	$stmt = Connexion::getInstance()->prepare("INSERT INTO ". $this -> table." (evenement, lien_image) ". "VALUES (?, ?)");
    	
    	$stmt->bindParam(1, $obj->getEvenement());
    	$stmt->bindParam(2, $obj->getLienImage());
    	
    	$stmt->execute();
    }

    protected function delete($obj) {
        
        $idEvenement=$obj->getIdEvenement();
    	
    	$stmt = Connexion::getInstance()->prepare("DELETE FROM ".$this->table." WHERE ".$this->clePrimaire." = ".$idEvenement.";");
        $stmt->execute();
    }
    
    protected function find($id) {
        $stmt = Connexion::getInstance()->prepare("SELECT * FROM ".$this->table." WHERE ".$this->clePrimaire." = ".$id.";");
        $stmt->execute();
        $d = $stmt->fetch();
        $evenement=new Evenement($d["id_evenement"], $d["evenement"], $d["lien_image"]);
            
        return $evenement;
        
    }
    
        protected function findByEvenement($evenement) {
        $stmt = Connexion::getInstance()->prepare("SELECT * FROM ".$this->table." WHERE evenement =".$evenement." = ".";");
        $stmt->execute();
        $d = $stmt->fetch();
        $ObjEvenement=new Evenement($d["id_evenement"], $d["evenement"], $d["lien_image"]);
            
        return $ObjEvenement;
        
    }
    protected function update($obj) {
        $evenement = $obj->getEvenement();
        $lienImage = $obj->getLienImage();
        $idEvenement = $obj->getId_evenement();
        
        $stmt = Connexion::getInstance()->prepare("UPDATE ".$this->table." SET evenement='?', lien_image='?'  WHERE id='?'; ");
        
        $stmt->bindParam(1, $evenement);
        $stmt->bindParam(2, $lienImage);
        $stmt->bindParam(3, $idEvenement);
        
        $stmt->execute(); 
        
    }

    
    
}

