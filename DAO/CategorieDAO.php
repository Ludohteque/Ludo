<?php

class CategorieDAO extends DAO{
    
    private $table = "categorie";
    private $clePrimaire = "nom_categorie";

    public function create($obj) {
        
        $nomCat=$obj->getNomCat();
    	$stmt = Connexion::prepare("INSERT INTO ".CategorieDAO::$table." (nom_cat)". "VALUES (?)");
       	$req->bindParam(1, $nomCat);    	
    	$req->execute();        
    }

        
    protected function delete($obj) {
        $nom_categorie=$obj->getNomCat();
        $stmt = Connexion::prepare("DELETE FROM ".CategorieDAO::$table." WHERE ".CategorieDAO::clePrimaire." = ".$nom_categorie.";");        $stmt->execute();
    }

    protected function find($id) {
        $stmt = Connexion::prepare("SELECT * FROM ".CategorieDAO::$table." WHERE ".CategorieDAO::clePrimaire." = ".$id.";");

        $stmt->execute();
        $d = $stmt->fetch();
        $categorie = new Categorie($d["nom_categorie"]);
            
        return $categorie;        
    }
    public function findParCategorie($categorie) {
        $stmt = Connexion::prepare("SELECT * FROM ".CategorieDAO::$table." WHERE categorie = ".$categorie.";");
        $stmt->execute();
        $d = $stmt->fetch();
        $user=new Categorie($d["nom_categorie"]);
            
        return $nomCat->getNomCat();
    }


    protected function update($obj) {
        $stmt = Connexion::prepare("UPDATE ".CategorieDAO::$table." SET nom_categorie='?', WHERE id='?' ; ");        
        $stmt->bindParam(1, $obj->getnomCat());
        
        $stmt->execute(); 
        
    }
    public function categorieExist($categorie){
        $succes=false;
        
        $categorieAComparer=self::findParCategorie($categorie);
        if($pseudoAComparer!==null){
            $succes=true;
        }
        return $succes;
    }

}


?>
