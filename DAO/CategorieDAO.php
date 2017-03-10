<?php

require_once 'Modele/Categorie.php';

class CategorieDAO extends DAO{
    
    private static $table = "categorie";
    private static $clePrimaire = "nom_categorie";
    private static $tableLien = "jeucategorie";

    public function create($obj) {
        
        $nomCat=$obj->getNomCat();
    	$stmt = Connexion::prepare("INSERT INTO ".CategorieDAO::$table." (nom_cat)". "VALUES (?)");
       	$req->bindParam(1, $nomCat);    	
    	$req->execute();        
    }

        
    public function delete($obj) {
        $nom_categorie=$obj->getNomCat();
        $stmt = Connexion::prepare("DELETE FROM ".CategorieDAO::$table." WHERE ".CategorieDAO::clePrimaire." = ".$nom_categorie.";");        
        $stmt->execute();
    }

    public function find($id) {
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


    public function update($obj) {
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
