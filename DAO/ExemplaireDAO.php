<?php

require_once 'Modele/Exemplaire.php';

class ExemplaireDAO extends DAO {

    private static $table="exemplaire";
    private static $id="id_exemplaire";
    
    public function create($obj) {
        $stmt = Connexion::prepare("INSERT INTO ".self::$table." (id_jeu, id_user, etat, disponibilite) "
                . "VALUES (?, ?, ?, ?)");
        $stmt->bindParam(1, $obj->getIdJeu());
        $stmt->bindParam(2, $obj->getIdUser());
        $stmt->bindParam(3, $obj->getEtat());
        $stmt->bindParam(4, $obj->getDisponibilite());
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

    public function delete($obj) {
        
    }

    public function find($id) {
        
    }

    public function update($obj) {
        
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

    public function findMesJeux($idUser) {
        $listeJeuxUser = array();
        $requete = "SELECT P.nom, TA.age_min, JC.nom_categorie, TA.age_min, P.image, P.note, P.image FROM ".self::$table." E INNER JOIN produit P ON E.id_jeu=P.id_produit INNER JOIN jeu J on P.id_produit=J.id_jeu INNER JOIN jeucategorie JC ON J.id_jeu=JC.id_jeu INNER JOIN trancheage TA ON J.id_age=TA.id_age WHERE E.id_user=".$idUser.";";
        $stmt = Connexion::prepare($requete);
        $stmt -> execute();
        $tuples = $stmt->fetchAll();
        if ($tuples != 0) {
            foreach ($tuples as $jeu) {
                $listeJeuxUser[] = $jeu;
            }
        }
        return $listeJeuxUser;
    }

    public function findListeExemplaire($idJeu) {
        $listeExemplaire = array();
        $requete = "SELECT * FROM " . self::$table . " WHERE id_jeu=" . $idJeu . ";";
        $stmt = Connexion::prepare($requete);
        $stmt->execute();
        $d = $stmt->fetchAll();
        foreach ($d as $unExemplaire) {
            $ex = new Exemplaire($unExemplaire['id_exemplaire'], $unExemplaire['id_jeu'], $unExemplaire['id_user'], $unExemplaire['etat'], $unExemplaire['disponibilite']);
            $listeExemplaire[] = $ex;
        }
        return $listeExemplaire;
    }

    public function estDisponible($idJeu, $idUser) {
        $requete = "SELECT disponibilite FROM " . self::$table . " WHERE id_jeu=" . $idJeu . " AND id_user=".$idUser.";";
        $stmt = Connexion::prepare($requete);
        $stmt->execute();
        $d = $stmt->fetch();
        return $d['disponibilite'];
    }

}
