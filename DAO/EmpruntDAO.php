<?php

class EmpruntDAO extends DAO {
    
    private $table = "emprunt";
    private $clePrimaire = "id_emprunts";
    
    public function create($obj) {
    	$date_emprunts=$obj->getDateEmprunt();
    	$date_remise=$obj->getDateRemise();
    	$id_emprunteur=$obj->getIdEmprunteur();
    	$id_exemplaire=$obj->getIdExemplaire();

    	$stmt = Connexion::prepare("INSERT INTO ".EmpruntDAO::$table." (date_emprunts, date_remise, id_emprunteur, id_exemplaire) "
                . "VALUES (?, ?, ?, ?)");
    	$stmt->bindParam(1, $date_emprunts);
    	$stmt->bindParam(2, $date_remise);
    	$stmt->bindParam(3, $id_emprunteur);
    	$stmt->bindParam(4, $id_exemplaire);
    	$stmt->execute();
    }

    public function delete($obj) {
        $id_emprunts=$obj->getId();
    	$stmt = Connexion::prepare("DELETE FROM ".EmpruntDAO::$table." WHERE ".EmpruntDAO::$id." = ".$id_emprunts.";");
        $stmt->execute();
    }

    public function find($id) {
        $stmt = Connexion::prepare("SELECT * FROM ".EmpruntDAO::$table." WHERE ".EmpruntDAO::$id." = ".$id.";");
        $stmt->execute();
        $d = $stmt->fetch();
        $user=new user($d["date_emprunts"], $d["date_remise"], $d["id_emprunteur"], $d["id_exemplaire"]);
            
        return $user;
   
    }

    public function update($obj) {
        
        $stmt = Connexion::prepare("UPDATE ".UserDAO::$table." SET date_emprunts='?', date_remise='?', id_emprunteur='?', id_exemplaire='?' WHERE id='?' ; ");
        
        $stmt->bindParam(1, $obj->getDateEmprunt());
        $stmt->bindParam(2, $obj->getDateRemise());
        $stmt->bindParam(3, $obj->getIdEmprunteur());
        $stmt->bindParam(4, $obj->getIdExemplaire());
        $stmt->bindParam(5, $obj->getId_emprunts());
        
        $stmt->execute(); 
        
    } 
        
    }



