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
    
    public function setCategoriesParJeu($jeu) {
        $listeCategories = array();
        $stmt = Connexion::prepare("SELECT nom_categorie FROM ".self::$tableLien." WHERE id_jeu=".$jeu->getIdProduit().";");
        $stmt->execute();
        $d = $stmt->fetchAll();
        foreach ($d as $value) {
            $listeCategories[] = $value['nom_categorie'];
        }
        $jeu->setLesCategories($listeCategories);
    }

}


?>
