<?php

require_once 'Modele/Produit.php';

class ProduitDAO extends DAO {
    
    private static $table = "produit";
    
    public function create($obj) {
        $stmt = Connexion::getInstance()->prepare("insert into ".self::$table." (idProduit, nom, note, descriptif, isValide, etat, dateAjout) values (?,?,?,?,?,?,?);");
        $stmt->bindParam(1, $obj->getIdProduit());
        $stmt->bindParam(1, $obj->getNom());
        $stmt->bindParam(2, $obj->getNote());
        $stmt->bindParam(3, $obj->getDescriptif());
        $stmt->bindParam(4, $obj->getIsValide());
        $stmt->bindParam(5, $obj->getEtat());
        $stmt->bindParam(6, $obj->getDateAjout());
        $stmt->execute();
        $id = Connexion::getInstance()->lastInsertId();
 
        $obj->setIdAge($id);
        
    }
    public function delete($obj) {
        
    }

    public function find($id) {
        
    }

    public function update($obj) {
        
    }

}
