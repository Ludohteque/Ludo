<?php

require_once 'Modele/TrancheAge.php';

class TrancheAgeDAO extends DAO {
    
    private static $table="trancheage";
    private static $id="id_age";
    
    
    public function create($obj) {
        
    	$ageMin=$obj->getAgeMin();
    	$ageMax=$obj->getAgeMax();
        $stmt = Connexion::prepare("INSERT INTO ".self::$table." (age_min, age_max) "
                . "VALUES (?, ?)");
    	$stmt->bindParam(1, $ageMin);
    	$stmt->bindParam(2, $ageMax);
        $stmt->execute();
    	
        
    }

    public function delete($obj) {
        $idCourant=$obj->getIdAge();
    	$stmt = Connexion::prepare("DELETE FROM ".self::$table." WHERE ".self::$id." = ".$idCourant.";");
        $stmt->execute();
    }

    public function find($id) {
        $stmt = Connexion::prepare("SELECT * FROM ".self::$table." WHERE ".self::$id." = ".$id.";");
        $stmt->execute();
        $d = $stmt->fetch();
        $trancheAge=new TrancheAge($d['id_age'],$d["age_min"], $d["age_max"]);
            
        return $trancheAge;
    }
    
    public function findAll() {
        $stmt = Connexion::prepare("SELECT * FROM ".self::$table." ORDER BY age_min ASC;");
        $stmt->execute();
        $result = $stmt->fetchAll();
        $listeTranches = array();
        foreach ($result as $value) {
            $trancheAge = new TrancheAge($value['id_age'],$value["age_min"], $value["age_max"]);
            $listeTranches[] = $trancheAge;
        }    
        return $listeTranches;
    }

    public function update($obj) {
        $idAge=$obj->getIdAge();
    	$ageMin=$obj->getAgeMin();
    	$ageMax=$obj->getAgeMax();
        
        $stmt = Connexion::prepare("UPDATE ".self::$table." SET age_min='?', age_max='?'  WHERE id_age='?' ; ");
        
        $stmt->bindParam(1, $ageMin);
        $stmt->bindParam(2, $ageMax);
        $stmt->bindParam(3, $idAge);
        
        
        $stmt->execute(); 
        
    }
    
    public function __toString() {
        $ageMin=$this->getAgeMin();
    	$ageMax=$this->getAgeMax();
        echo $ageMin." ans / ".$ageMax." ans";
    }

}

