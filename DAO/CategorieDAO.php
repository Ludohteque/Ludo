<?php

require_once 'Modele/Categorie.php';

class CategorieDAO extends DAO{
    
    private static $table = "categorie";
    private static $clePrimaire1 = "nom_categorie";
    private static $clePrimaire2 = "id_jeu";
    private static $tableLien = "jeucategorie";

    public function create($obj) {
        
        $nomCat=$obj->getNomCat();
    	$stmt = Connexion::prepare("INSERT INTO ".self::$table." (nom_cat)". "VALUES (?)");
       	$req->bindParam(1, $nomCat);    	
    	$req->execute();        
    }

        
    public function delete($obj) {
        $nom_categorie=$obj->getNomCat();
        $stmt = Connexion::prepare("DELETE FROM ".self::$table." WHERE ".self::clePrimaire." = ".$nom_categorie.";");        
        $stmt->execute();
    }

    public function find($id) {
        $stmt = Connexion::prepare("SELECT * FROM ".self::$tableLien." WHERE ".self::$clePrimaire2." = ".$id.";");
        $stmt->execute();
        $d = $stmt->fetch();
        $categorie = new Categorie($d["nom_categorie"]);
        return $categorie;        
    }
    
    public function findAll($id) {
        $categories = array();
        $stmt = Connexion::prepare("SELECT * FROM ".self::$tableLien." WHERE ".self::$clePrimaire2." = ".$id.";");
        $stmt->execute();
        $result = $stmt->fetchAll();
        foreach ($result as $uneCat) {
            $categories[] = $uneCat["nom_categorie"];
        }
        return $categories;        
    }
    
    public function findCategories() {
        $categories = array();
        $stmt = Connexion::prepare("SELECT * FROM ".self::$table." ORDER BY nom_categorie;");
        $stmt->execute();
        $result = $stmt->fetchAll();
        foreach ($result as $uneCat) {
            $categories[] = $uneCat["nom_categorie"];
        }
        return $categories;        
    }
    
    public function findParCategorie($categorie) {
        $stmt = Connexion::prepare("SELECT * FROM ".self::$table." WHERE categorie = ".$categorie.";");
        $stmt->execute();
        $d = $stmt->fetch();
        $user=new Categorie($d["nom_categorie"]);
            
        return $nomCat->getNomCat();
    }


    public function update($obj) {
        $stmt = Connexion::prepare("UPDATE ".self::$table." SET nom_categorie='?', WHERE id='?' ; ");        
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
