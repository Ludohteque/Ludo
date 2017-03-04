<?php
require_once 'Modele/Emprunt.php';

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
        $emprunt=new Emprunt($d["id_emprunts"],$d["date_emprunts"], $d["date_remise"], $d["id_emprunteur"], $d["id_exemplaire"]);
        return $emprunt;
    }

    public function update($obj) {
        $dateEmprunt = $obj->getDateEmprunt();
        $dateRemise = $obj->getDateRemise();
        $idEmprunteur = $obj->getIdEmprunteur();
        $idExemplaire = $obj->getIdExemplaire();
        $idEmprunt = $obj->getId_emprunts();
        
        $stmt = Connexion::prepare("UPDATE ".UserDAO::$table." SET date_emprunts='?', date_remise='?', id_emprunteur='?', id_exemplaire='?' WHERE id='?' ; ");
        
        $stmt->bindParam(1, $dateEmprunt);
        $stmt->bindParam(2, $dateRemise);
        $stmt->bindParam(3, $idEmprunteur);
        $stmt->bindParam(4, $idExemplaire);
        $stmt->bindParam(5, $idEmprunt);
        
        $stmt->execute(); 
        
    }
    
    public function getEmprunts() {
        $stmt = Connexion::prepare("select * from emprunt ORDER BY date_emprunts DESC LIMIT 10;");
        $stmt->execute();
        $result = $stmt->fetchAll();
        $listeEmprunts = array();
        foreach ($result as $value) {
            $newemprunt = new Emprunt($value['id_emprunts'],$value['date_emprunts'], $value['date_remise'], $value['id_emprunteur'], $value['id_exemplaire']);
            $listeEmprunts[] = $newemprunt;
        }
        return $listeEmprunts;
    }
        
    }



