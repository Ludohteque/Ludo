<?php
require_once ('Modele/Emprunt.php');

class EmpruntDAO extends DAO {
    
    private static $table = "emprunt";
    private static $clePrimaire = "id_emprunts";
    
    public function create($obj) {
    	$date_emprunts=$obj->getDateEmprunts();
    	$date_remise=$obj->getDateRemise();
    	$id_emprunteur=$obj->getIdEmprunteur()->getIdUser();
    	$id_exemplaire=$obj->getIdExemplaire()->getIdExemplaire();
    	$stmt = Connexion::prepare("INSERT INTO ".self::$table." (date_emprunts, date_remise, id_emprunteur, id_exemplaire) "
                . "VALUES (?, ?, ?, ?)");
    	$stmt->bindParam(1, $date_emprunts);
    	$stmt->bindParam(2, $date_remise);
    	$stmt->bindParam(3, $id_emprunteur);
    	$stmt->bindParam(4, $id_exemplaire);
    	$stmt->execute();
    }

    public function delete($obj) {
        $id_emprunts=$obj->getId();
    	$stmt = Connexion::prepare("DELETE FROM ".self::$table." WHERE ".self::$id." = ".$id_emprunts.";");
        $stmt->execute();
    }

    public function find($id) {
        $stmt = Connexion::prepare("SELECT * FROM ".self::$table." WHERE ".self::$clePrimaire." = ".$id.";");
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
        
        $stmt = Connexion::prepare("UPDATE ".self::$table." SET date_emprunts='?', date_remise='?', id_emprunteur='?', id_exemplaire='?' WHERE id='?' ; ");
        
        $stmt->bindParam(1, $dateEmprunt);
        $stmt->bindParam(2, $dateRemise);
        $stmt->bindParam(3, $idEmprunteur);
        $stmt->bindParam(4, $idExemplaire);
        $stmt->bindParam(5, $idEmprunt);
        
        $stmt->execute(); 
        
    }
    
    public function getDerniersEmprunts() {
        $stmt = Connexion::prepare("select * from ".self::$table." ORDER BY date_emprunts DESC LIMIT 10;");
        $stmt->execute();
        $result = $stmt->fetchAll();
        $listeEmprunts = array();
        foreach ($result as $value) {
            $daouser = new UserDAO();
            $user = $daouser->find($value['id_emprunteur']);
            $daoexemplaire = new ExemplaireDAO();
            $exemplaire = $daoexemplaire->find($value['id_exemplaire']);
            $newemprunt = new Emprunt($value['id_emprunts'],$value['date_emprunts'], $value['date_remise'], $user, $exemplaire);
            $listeEmprunts[] = $newemprunt;
        }
        return $listeEmprunts;
    }
    
    public function getMesPrets($id) {
        $stmt = Connexion::prepare("select * from exemplaire INNER JOIN emprunt USING (id_exemplaire) WHERE id_user = ".$id.";");
        $stmt->execute();
        $result = $stmt->fetchAll();
        $listePrets = array();
        foreach ($result as $value) {
            $daouser = new UserDAO();
            $user = $daouser->find($value['id_emprunteur']);
            $daoexemplaire = new ExemplaireDAO();
            $exemplaire = $daoexemplaire->find($value['id_exemplaire']);
            $newPret = new Emprunt($value['id_emprunts'],$value['date_emprunts'], $value['date_remise'], $user, $exemplaire);
            $listePrets[] = $newPret;
        }
        return $listePrets;
    }
    
    public function getMesEmprunts($id) {
        $stmt = Connexion::prepare("select * from ".self::$table." WHERE id_emprunteur = ".$id.";");
        $stmt->execute();
        $result = $stmt->fetchAll();
        $listeEmprunts = array();
        foreach ($result as $value) {
            $daouser = new UserDAO();
            $user = $daouser->find($value['id_emprunteur']);
            $daoexemplaire = new ExemplaireDAO();
            $exemplaire = $daoexemplaire->find($value['id_exemplaire']);
            $newEmprunt = new Emprunt($value['id_emprunts'],$value['date_emprunts'], $value['date_remise'], $user, $exemplaire);
            $listeEmprunts[] = $newEmprunt;
        }
        return $listeEmprunts;
    }
    
        
    }



