<?php

class CategorieDAO extends DAO{
    
    private $table = "categorie";
    private $clePrimaire = "nom_categorie";

    protected function create($obj) {
        
        $nomCat=$obj->getNomCat();
        
    	$req = Connexion::getInstance()->prepare("INSERT INTO ".$this->table." (nom_cat)". "VALUES (?)");
       	$req->bindParam(1, $nomCat);    	
    	$req->execute();        
    }

    protected function delete($obj) {
        $nom_categorie=$obj->getNomCat();
        $stmt = Connexion::getInstance()->prepare("DELETE FROM ".$this->table." WHERE ".$this->clePrimaire." = ".$nom_categorie.";");
        $stmt->execute();
    }

    protected function find($id) {
        $stmt = Connexion::getInstance()->prepare("SELECT * FROM ".$this->table." WHERE ".$this->clePrimaire." = ".$nom_categorie.";");
        $stmt->execute();
        $d = $stmt->fetch();
        $user=new user($d["nom_categorie"]);
            
        return $categorie;
        
    }

    protected function update($obj) {
        $stmt = Connexion::getInstance()->prepare("UPDATE ".$this->table." SET nom_categorie='?' ; ");
        
        $stmt->bindParam(1, $obj->getnomCat());
        
        $stmt->execute(); 
        
    }

}


?>
