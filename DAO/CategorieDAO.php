<?php

class CategorieDAO extends DAO{
    
    private $table = "categorie";
    private $clePrimaire = "id_categorie";

    protected function create($obj) {
        
        $nomCat=$obj->getCorps();
    	$idExpediteur=$obj->getIdExpediteur();
    	$idDestinataire=$obj->getIdDestinataire();
    	$sujet=$obj->getSujet();
    	$type=$obj->getType();
        
    	$req = Connexion::getInstance()->prepare("INSERT INTO ".$this->table." (corps, idExpediteur, idDestinataire, sujet, type) VALUES (?, ?, ?, ?, ?)");
       	$req->bindParam(1, $corps);
    	$req->bindParam(2, $idExpediteur);
    	$req->bindParam(3, $idDestinataire);
    	$req->bindParam(4, $sujet);
    	$req->bindParam(5, $type);
    	
    	$req->execute();
        
    }

    protected function delete($obj) {
        
    }

    protected function find($id) {
        
    }

    protected function update($obj) {
        
    }

}


?>
