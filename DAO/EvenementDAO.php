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
        $user=new user($d["id_evenement"], $d["evenement"], $d["lien_image"]);
            
        return $user;
        
    }
    
        protected function findByEvenement($evenement) {
        $stmt = Connexion::getInstance()->prepare("SELECT * FROM ".$this->table." WHERE evenement =".$evenement." = ".";");
        $stmt->execute();
        $d = $stmt->fetch();
        $user=new user($d["id_evenement"], $d["evenement"], $d["lien_image"]);
            
        return $user;
        
    }
    protected function update($obj) {
        $stmt = Connexion::getInstance()->prepare("UPDATE ".$this->table." SET evenement='?', lien_image='?'  WHERE id='?'; ");
        
        $stmt->bindParam(1, $obj->getEvenement());
        $stmt->bindParam(2, $obj->getLienImage());
        $stmt->bindParam(3, $obj->getId_evenement());
        
        $stmt->execute(); 
        
    }

    
    
}

