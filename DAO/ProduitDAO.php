<?php

class ProduitDAO extends DAO {
    
    public function create($obj) {
        $stmt = Connexion::getInstance()->prepare("insert into ".$this->table." (idProduit, nom, note, descriptif, isValide, etat, dateAjout) values (?,?,?,?,?,?,?);");
        $stmt->bindParam(1, $obj->getIdProduit());
        $stmt->bindParam(2, $obj->getNom());
        $stmt->bindParam(3, $obj->getNote());
        $stmt->bindParam(3, $obj->getDescriptif());
        $stmt->bindParam(3, $obj->getIsValide());
        $stmt->bindParam(3, $obj->getEtat());
        $stmt->bindParam(3, $obj->getDateAjout());
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
