<?php

require_once 'Modele/Exemplaire.php';

class ExemplaireDAO extends DAO {

    private static $table = "exemplaire";
    private static $id = "id_exemplaire";

    public function create($obj) {
        $idJeu = $obj->getIdJeu()->getIdJeu();
        $idUser = $obj->getIdUser()->getIdUser();
        $etat = $obj->getEtat();
        $dispo = $obj->getDisponibilite();
        $stmt = Connexion::prepare("INSERT INTO " . self::$table . " (id_jeu, id_user, etat, disponibilite) "
                        . "VALUES (?, ?, ?, ?)");
        $stmt->bindParam(1, $idJeu);
        $stmt->bindParam(2, $idUser);
        $stmt->bindParam(3, $etat);
        $stmt->bindParam(4, $dispo);
        $stmt->execute();
    }

    public function findParIdJeu($idJeu) {
        $stmt = Connexion::prepare("SELECT * FROM " . self::$table . " WHERE id_jeu = " . $idJeu . ";");
        $stmt->execute();
        $d = $stmt->fetch();
        $exemplaire = new Exemplaire($d["id_exemplaire"], $d["id_jeu"], $d["id_user"], $d["etat"], $d["disponibilite"]);
        return $exemplaire;
    }

    public function findParIdUser($idUser) {
        $stmt = Connexion::prepare("SELECT * FROM " . self::$table . " WHERE id_user = " . $idUser . ";");
        $stmt->execute();
        $result = $stmt->fetchAll();
        $listeJeuxUser = array();
        foreach ($result as $exemplaire) {
            $daojeu = new JeuDAO();
            $jeu = $daojeu->find($exemplaire["id_jeu"]);
            $daouser = new UserDAO();
            $user = $daouser->find($exemplaire["id_user"]);
            $exemplaire = new Exemplaire($exemplaire['id_exemplaire'], $jeu, $user, $exemplaire["etat"], $exemplaire["disponibilite"]);
            $listeJeuxUser[] = $exemplaire;
        }
        return $listeJeuxUser;
    }

    public function delete($obj) {
        $id = $obj->getIdExemplaire();
        $stmt = Connexion::prepare("DELETE FROM " . self::$table . " WHERE id_exemplaire = " . $id . ";");
        $stmt->execute();
    }

    public function find($id) {
        $stmt = Connexion::prepare("SELECT * FROM " . self::$table . " WHERE id_exemplaire = " . $id . ";");
        $stmt->execute();
        $d = $stmt->fetch();
        $daojeu = new JeuDAO();
        $jeu = $daojeu->find($d['id_jeu']);
        $daouser = new UserDAO();
        $user = $daouser->find($d['id_user']);
        $exemplaire = new Exemplaire($d["id_exemplaire"], $jeu, $user, $d["etat"], $d["disponibilite"]);
        return $exemplaire;
    }

    public function update($obj) {
//        $idJeu = $obj->getIdJeu()->getIdJeu();
//        $idUser = $obj->getIdUser()->getIdUser();
        $idexemplaire = $obj->getIdExemplaire();
        $etat = $obj->getEtat();
        $dispo = $obj->getDisponibilite();
        $stmt = Connexion::prepare("UPDATE ". self::$table ." set etat=\"".$etat."\", disponibilite=".$dispo." WHERE id_exemplaire=".$idexemplaire."");
        $stmt->execute();
    }

    public function findUserExemplaires($idUser) {
        $listeJeuxUser = array();
        $stmt = Connexion::prepare("SELECT * FROM " . self::$table . " WHERE id_user = " . $idUser . ";");
        $stmt->execute();
        $d = $stmt->fetch();
        foreach ($d as $exemplaire) {
            $exemplaire = new Exemplaire($d["id_exemplaire"], $d["id_jeu"], $d["id_user"], $d["etat"], $d["disponibilite"]);
            $listeJeuxUser[] = $exemplaire;
        }
        return $listeJeuxUser;
    }

//    public function findMesJeux($idUser) {
//        $listeJeuxUser = array();
//        $requete = "SELECT P.nom, TA.age_min, JC.nom_categorie, TA.age_min, P.image, P.note, P.image FROM " . self::$table . " E INNER JOIN produit P ON E.id_jeu=P.id_produit INNER JOIN jeu J on P.id_produit=J.id_jeu INNER JOIN jeucategorie JC ON J.id_jeu=JC.id_jeu INNER JOIN trancheage TA ON J.id_age=TA.id_age WHERE E.id_user=" . $idUser . ";";
//        $stmt = Connexion::prepare($requete);
//        $stmt->execute();
//        $tuples = $stmt->fetchAll();
//        if ($tuples != 0) {
//            foreach ($tuples as $jeu) {
//                $listeJeuxUser[] = $jeu;
//            }
//        }
//        return $listeJeuxUser;
//    }

    public function findListeExemplaire($idJeu) {
        $listeExemplaire = array();
        $requete = "SELECT * FROM " . self::$table . " WHERE id_jeu=" . $idJeu . ";";
        $stmt = Connexion::prepare($requete);
        $stmt->execute();
        $d = $stmt->fetchAll();
        foreach ($d as $unExemplaire) {
            $daojeu = new JeuDAO();
            $jeu = $daojeu->find($unExemplaire['id_jeu']);
            $daouser = new UserDAO();
            $user = $daouser->find($unExemplaire['id_user']);
            $ex = new Exemplaire($unExemplaire['id_exemplaire'], $jeu, $user, $unExemplaire['etat'], $unExemplaire['disponibilite']);
            $listeExemplaire[] = $ex;
        }
        return $listeExemplaire;
    }

}
