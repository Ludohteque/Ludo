<?php

require_once ('Modele/Emprunt.php');

class EmpruntDAO extends DAO {

    private static $table = "emprunt";
    private static $clePrimaire = "id_emprunts";

    public function create($obj) {
        $date_emprunts = $obj->getDateEmprunts();
        $date_remise = $obj->getDateRemise();
        $id_emprunteur = $obj->getIdEmprunteur()->getIdUser();
        $id_exemplaire = $obj->getIdExemplaire()->getIdExemplaire();
        $statut = $obj->getStatut();
        $limite = $obj->getDateLimite();
        $stmt = Connexion::prepare("INSERT INTO " . self::$table . " (date_emprunts, date_remise, id_emprunteur, id_exemplaire, statut, date_limite) "
                        . "VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bindParam(1, $date_emprunts);
        $stmt->bindParam(2, $date_remise);
        $stmt->bindParam(3, $id_emprunteur);
        $stmt->bindParam(4, $id_exemplaire);
        $stmt->bindParam(5, $statut);
        $stmt->bindParam(6, $limite);
        $stmt->execute();
    }

    public function delete($obj) {
        $id_emprunts = $obj->getIdEmprunts();
        $stmt = Connexion::prepare("DELETE FROM " . self::$table . " WHERE " . self::$id . " = " . $id_emprunts . ";");
        $stmt->execute();
    }

    public function find($id) {
        $stmt = Connexion::prepare("SELECT * FROM " . self::$table . " WHERE " . self::$clePrimaire . " = " . $id . ";");
        $stmt->execute();
        $d = $stmt->fetch();
        $daouser = new UserDAO();
        $user = $daouser->find($d['id_emprunteur']);
        $daoexemplaire = new ExemplaireDAO();
        $exemplaire = $daoexemplaire->find($d['id_exemplaire']);
        $emprunt = new Emprunt($d["id_emprunts"], $d["date_emprunts"], $d["date_remise"], $user, $exemplaire, $d['statut'], $d['date_limite']);
        return $emprunt;
    }

    public function update($obj) {
        $dateEmprunt = $obj->getDateEmprunts();
        $dateRemise = $obj->getDateRemise();
        $idEmprunteur = $obj->getIdEmprunteur()->getIdUser();
        $idExemplaire = $obj->getIdExemplaire()->getIdExemplaire();
        $idEmprunt = $obj->getIdEmprunts();
        $statut = $obj->getStatut();
        $limite = $obj->getDateLimite();
        $stmt = Connexion::prepare("UPDATE " . self::$table . " SET date_emprunts=?, date_remise=?, id_emprunteur=?, id_exemplaire=?, statut=?, date_limite=? WHERE id_emprunts=? ; ");

        $stmt->bindParam(1, $dateEmprunt);
        $stmt->bindParam(2, $dateRemise);
        $stmt->bindParam(3, $idEmprunteur);
        $stmt->bindParam(4, $idExemplaire);
        $stmt->bindParam(5, $statut);
        $stmt->bindParam(6, $limite);
        $stmt->bindParam(7, $idEmprunt);

        $stmt->execute();
    }

    public function getDerniersEmprunts($limite) {
        if ($limite){
            $lim = 'LIMIT 10';
        }else{
            $lim = '';
        }
            
        $stmt = Connexion::prepare("select * from " . self::$table . " ORDER BY date_emprunts DESC ".$lim.';');
        $stmt->execute();
        $result = $stmt->fetchAll();
        $listeEmprunts = array();
        foreach ($result as $value) {
            $daouser = new UserDAO();
            $user = $daouser->find($value['id_emprunteur']);
            $daoexemplaire = new ExemplaireDAO();
            $exemplaire = $daoexemplaire->find($value['id_exemplaire']);
            $newemprunt = new Emprunt($value['id_emprunts'], $value['date_emprunts'], $value['date_remise'], $user, $exemplaire, $value['statut'], $value['date_limite']);
            $listeEmprunts[] = $newemprunt;
        }
        return $listeEmprunts;
    }

    public function getMesPrets($id, $statut) {
        if ($statut != null) {
            $stmt = Connexion::prepare("select * from exemplaire INNER JOIN emprunt USING (id_exemplaire) WHERE id_user = " . $id . " and statut = '$statut';");
        } else {
            $stmt = Connexion::prepare("select * from exemplaire INNER JOIN emprunt USING (id_exemplaire) WHERE id_user = " . $id . ";");
        }
        $stmt->execute();
        $result = $stmt->fetchAll();
        $listePrets = array();
        foreach ($result as $value) {
            $daouser = new UserDAO();
            $user = $daouser->find($value['id_emprunteur']);
            $daoexemplaire = new ExemplaireDAO();
            $exemplaire = $daoexemplaire->find($value['id_exemplaire']);
            $newPret = new Emprunt($value['id_emprunts'], $value['date_emprunts'], $value['date_remise'], $user, $exemplaire, $value['statut'], $value['date_limite']);
            $listePrets[] = $newPret;
        }
        return $listePrets;
    }

    public function getMesEmprunts($id, $statut) {
        if ($statut != null) {
            $stmt = Connexion::prepare("select * from " . self::$table . " WHERE id_emprunteur = " . $id . " and statut = '" . $statut . "';");
        } else {
            $stmt = Connexion::prepare("select * from " . self::$table . " WHERE id_emprunteur = " . $id . ";");
        }
        $stmt->execute();
        $result = $stmt->fetchAll();
        $listeEmprunts = array();
        foreach ($result as $value) {
            $daouser = new UserDAO();
            $user = $daouser->find($value['id_emprunteur']);
            $daoexemplaire = new ExemplaireDAO();
            $exemplaire = $daoexemplaire->find($value['id_exemplaire']);
            $newEmprunt = new Emprunt($value['id_emprunts'], $value['date_emprunts'], $value['date_remise'], $user, $exemplaire, $value['statut'], $value['date_limite']);
            $listeEmprunts[] = $newEmprunt;
        }
        return $listeEmprunts;
    }

}
