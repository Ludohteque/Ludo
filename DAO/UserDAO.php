<?php

class UserDAO extends DAO {
	
    private static $table="user";
    private static $id="id_user";
    //verifuser et connex user
    
    
    protected function create($obj) {
        
    	$pseudo=$obj->getPseudo();
    	$ville=$obj->getVille();
    	$mail=$obj->getMail();
    	$tel=$obj->getTel();
    	$mdp=$obj->getMdp();
    	
    	
    	$stmt = Connexion::getInstance()->prepare("INSERT INTO ".$this->table." (pseudo, ville, mail, tel, mdp) VALUES (?, ?, ?, ?, ?)");
    	
    	$stmt->bindParam(1, $pseudo);
    	$stmt->bindParam(2, $ville);
    	$stmt->bindParam(3, $mail);
    	$stmt->bindParam(4, $tel);
    	$stmt->bindParam(5, $mdp);
    	
    	$stmt->execute();
    }

    protected function delete($obj) {
        $idCourant=$obj->getId();
    	
    	$stmt = Connexion::getInstance()->prepare("DELETE FROM ".$this->table." WHERE ".$this->id." = ".$idCourant.";");
        $stmt->execute();
    }

    protected function find($id) {
        $stmt = Connexion::getInstance()->prepare("SELECT * FROM ".$this->table." WHERE ".$this->id." = ".$id.";");
        $stmt->execute();
        
    }

    protected function update($obj) {
        
    }
    
    protected function findParId($pseudo) {
        
    }
}

?>