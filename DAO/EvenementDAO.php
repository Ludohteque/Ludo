<?php

require_once 'Modele/Evenement.php';
class EvenementDAO extends DAO {
    
    private $table = "evenement";
    private $clePrimaire = "id_evenement";
    private $cleDate = "date_ajout";
    
    public function create($obj) {
    	$stmt = Connexion::getInstance()->prepare("INSERT INTO ". $this -> table." (evenement, lien_image, titre, date_ajout) ". "VALUES (?, ?, ?, ?)");
    	
    	$stmt->bindParam(1, $obj->getEvenement());
    	$stmt->bindParam(2, $obj->getLienImage());
    	$stmt->bindParam(3, $obj->getTitre());
    	$stmt->bindParam(4, $obj->getDateAjout());
    	$stmt->execute();
    }

    public function delete($obj) {
        
        $idEvenement=$obj->getIdEvenement();
    	
    	$stmt = Connexion::getInstance()->prepare("DELETE FROM ".$this->table." WHERE ".$this->clePrimaire." = ".$idEvenement.";");
        $stmt->execute();
    }
    
    public function find($id) {
        $stmt = Connexion::getInstance()->prepare("SELECT * FROM ".$this->table." WHERE ".$this->clePrimaire." = ".$id.";");
        $stmt->execute();
        $d = $stmt->fetch();
        $evenement=new Evenement($d["id_evenement"], $d["evenement"], $d["lien_image"]);
            
        return $evenement;
        
    }
    
        public function findByEvenement($evenement) {
        $stmt = Connexion::getInstance()->prepare("SELECT * FROM ".$this->table." WHERE evenement =".$evenement." = ".";");
        $stmt->execute();
        $d = $stmt->fetch();
        $ObjEvenement=new Evenement($d["id_evenement"], $d["evenement"], $d["lien_image"]);
            
        return $ObjEvenement;
        
    }
    public function update($obj) {
        $evenement = $obj->getEvenement();
        $lienImage = $obj->getLienImage();
        $idEvenement = $obj->getId_evenement();
        
        $stmt = Connexion::getInstance()->prepare("UPDATE ".$this->table." SET evenement='?', lien_image='?'  WHERE id='?'; ");
        
        $stmt->bindParam(1, $evenement);
        $stmt->bindParam(2, $lienImage);
        $stmt->bindParam(3, $idEvenement);
        
        $stmt->execute(); 
        
    }

    public function findDernierEvenement() { //select * from evenement order by date_ajout desc limit 4 ".$this->clePrimare."
        $listeEven = array();
        $stmt = Connexion::getInstance()->prepare("SELECT * FROM ".$this->table." ORDER BY ".$this->cleDate." DESC LIMIT 4;");
        $stmt->execute();
        $resultats = $stmt->fetchAll();
        if ($resultats != 0) {
            foreach ($resultats as $unResultat) {
                $evenement=new Evenement($unResultat["id_evenement"], $unResultat["evenement"], $unResultat["lien_image"], $unResultat["titre"],$unResultat["date_ajout"]);
                $listeEven[] = $evenement;
            }
        }
        return $listeEven;
        
    }
    
}

