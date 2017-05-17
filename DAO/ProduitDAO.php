<?php

require_once 'Modele/Produit.php';

class ProduitDAO extends DAO {
    
    private static $table = "produit";
    private static $cle = "id_produit";
    
//    public function create($obj) {
//        $stmt = Connexion::getInstance()->prepare("insert into ".self::$table." (idProduit, nom, note, descriptif, isValide, etat, dateAjout) values (?,?,?,?,?,?,?);");
//        $stmt->bindParam(1, $obj->getIdProduit());
//        $stmt->bindParam(1, $obj->getNom());
//        $stmt->bindParam(2, $obj->getNote());
//        $stmt->bindParam(3, $obj->getDescriptif());
//        $stmt->bindParam(4, $obj->getIsValide());
//        $stmt->bindParam(5, $obj->getEtat());
//        $stmt->bindParam(6, $obj->getDateAjout());
//        $stmt->execute();
//        $id = Connexion::getInstance()->lastInsertId();
// 
//        $obj->setIdAge($id);
//        
//    }
    
    public function create($obj) {
        $nom = $obj->getNom();
        $note = 3;
        $descriptif = $obj->getDescriptif();
        $valide = 0;
        $etat = $obj->getEtat();
        $date = $obj->getDateAjout();
        $image = $obj->getImage();
        $stmt = Connexion::getInstance()->prepare("insert into ".self::$table." (nom, note, descriptif, isValide, etat, dateAjout, image) values (?,?,?,?,?,?,?);");
        $stmt->bindParam(1, $nom);
        $stmt->bindParam(2, $note);
        $stmt->bindParam(3, $descriptif);
        $stmt->bindParam(4, $valide);
        $stmt->bindParam(5, $etat);
        $stmt->bindParam(6, $date);
        $stmt->bindParam(7, $image);
        $stmt->execute();
        $id = Connexion::getInstance()->dernierIdInsere(self::$cle, self::$table);
 
        $obj->setIdProduit($id);
        
    }
    public function delete($obj) {
        
    }

    public function find($id) {
        
    }

    public function update($obj) {
        
    }

}
