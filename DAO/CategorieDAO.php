<?php

class CategorieDAO extends DAO{
    
    private $table = "categorie";
    private $clePrimaire = "nom_categorie";

    public function create($obj) {
        
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
        $stmt = Connexion::getInstance()->prepare("SELECT * FROM ".$this->table." WHERE ".$this->clePrimaire." = ".$id.";");
        $stmt->execute();
        $d = $stmt->fetch();
        $categorie = new categorie($d["nom_categorie"]);
            
        return $categorie;
        
    }


    protected function update($obj) {
        $stmt = Connexion::getInstance()->prepare("UPDATE ".$this->table." SET nom_categorie='?' ; ");
        
        $stmt->bindParam(1, $obj->getnomCat());
        
        $stmt->execute(); 
        
    }
    
        protected function categorieExist($obj){
        $succes=false;
        
        $categorieCourant=$obj->getnomCat();
        
        $objAComparer=self::find($categorieCourant);
        $categorieAComparer=$objAComparer->getPseudo();
        
        if($categorieCourant==$objAComparer){
            $succes=true;
        }
        return $succes;
    }

}


?>
