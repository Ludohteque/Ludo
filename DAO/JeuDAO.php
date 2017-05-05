<?php

require_once 'Modele/Jeu.php';

class JeuDAO extends DAO {

    private static $tableMere = "produit";
    private static $clePrimaireMere = "id_produit";
    private static $tableFille = "jeu";
    private static $clePrimaireFille = "id_jeu";
    private static $dateAjout = "date_ajout";

    public function create($obj) {
        $stmt = Connexion::prepare("insert into " . self::$tableMere . " (nom, descriptif, etat) values (?,?,?);");
        $stmt->bindParam(1, $obj->getNomJeu());
        $stmt->bindParam(2, $obj->getDescriptif());
        $stmt->bindParam(3, $obj->getEtat());
        $stmt->execute();
        $id = Connexion::getInstance()->lastInsertId();

        $stmt2 = Connexion::prepare("insert into " . self::$tableMere . " (id_jeu, id_age, id_categorie, id_duree, nb_joueurs) values (?,?,?,?,?);");
        $stmt2->bindParam(1, $id);
        $stmt2->bindParam(2, $obj->getIdAge());
        $stmt2->bindParam(3, $obj->getIdCat());
        $stmt2->bindParam(4, $obj->getIdDuree());
        $stmt2->bindParam(5, $obj->getNbJoueurs());
        $stmt2->execute();
        $obj->setIdJeu($id);
    }

    public function delete($obj) {
        $stmt = Connexion::prepare("delete from " . self::$tableFille . " where " . self::$clePrimaireFille . " = " . $obj->getIdJeu() . ";");
        $stmt->execute();

        $stmt2 = Connexion::prepare("delete from " . self::$tableMere . " where " . self::$clePrimaireMere . " = " . $obj->getIdJeu() . ";");
        $stmt2->execute();
    }

    public function find($id) {
        $stmt = Connexion::prepare("select * from " . self::$tableFille . " "
                        . "inner join " . self::$tableMere . " on " . self::$tableFille . "." . self::$clePrimaireFille . "=" . self::$tableMere . "." . self::$clePrimaireMere . " "
                        . "where " . self::$tableFille . "." . self::$clePrimaireFille . " = " . $id . ";");
        $stmt->execute();
        $result = $stmt->fetch();
        $nbjoueeursdao = new NombreJoueursDAO();
        $nbJoueurs = $nbjoueeursdao->find($result['id_nb_joueurs']);
        $daoage = new TrancheAgeDAO();
        $age = $daoage->find($result['id_age']);
        $daoduree = new DureeDAO();
        $duree = $daoduree->find($result['id_duree']);
        $daocat = new CategorieDAO();
        $lesCat = $daocat->findAll($result['id_jeu']);
        $jeu = new Jeu($result['id_jeu'], $result['nom'], $result['descriptif'], $result['etat'], $result['note'], $result['date_ajout'], $result['image'], $nbJoueurs, $age, $duree, $lesCat);
        return $jeu;
    }

    public function update($obj) {
        $id = $obj->getIdJeu();
        $stmt = Connexion::getInstance()->prepare("update " . self::$tableFille . " set id_age=?, nb_joueurs=?, id_categorie=?, id_duree=?, descriptif=? where " . self::$clePrimaireFille . "=" . $id . ";");
        $stmt->bindParam(1, $obj->getIdAge());
        $stmt->bindParam(2, $obj->getNbJoueurs());
        $stmt->bindParam(3, $obj->getIdCat());
        $stmt->bindParam(4, $obj->getIdDuree());
        $stmt->bindParam(5, $obj->getDescriptif());
        $stmt2 = Connexion::getInstance()->prepare("update " . self::$tableMere . " set nom=?, etat=?, note=?, descriptif=?, date_ajout=? where " . self::$clePrimaireMere . "=" . $id . ";");
        $stmt2->bindParam(1, $obj->getNom());
        $stmt2->bindParam(2, $obj->getEtat());
        $stmt2->bindParam(3, $obj->getNote());
        $stmt2->bindParam(4, $obj->getDescriptif());
        $stmt2->bindParam(5, $obj->getDateAjout());
    }

    public function getNouveautes() {
        $stmt = Connexion::prepare("select * from " . self::$tableMere . " inner join " . self::$tableFille . " on " . self::$tableFille . "." . self::$clePrimaireFille . "=" . self::$tableMere . "." . self::$clePrimaireMere . " ORDER BY " . self::$dateAjout . " DESC LIMIT 10;");
        $stmt->execute();
        $result = $stmt->fetchAll();
        $listeJeux = array();
        //var_dump($result);
        foreach ($result as $value) {
            $nbjoueeursdao = new NombreJoueursDAO();
            $nbJoueurs = $nbjoueeursdao->find($value['id_nb_joueurs']);
            $daoage = new TrancheAgeDAO();
            $age = $daoage->find($value['id_age']);
            $daoduree = new DureeDAO();
            $duree = $daoduree->find($value['id_duree']);
            $daocat = new CategorieDAO();
            $lesCat = $daocat->findAll($value['id_jeu']);
            $newjeu = new Jeu($value['id_jeu'], $value['nom'], $value['descriptif'], $value['etat'], $value['note'], $value['date_ajout'], $value['image'], $nbJoueurs, $age, $duree, $lesCat);
            $listeJeux[] = $newjeu;
        }
        return $listeJeux;
    }

    // renvoie une liste d'objet Jeu
    public function getPopulaires() {
        $stmt = Connexion::prepare("select * from " . self::$tableMere . " inner join " . self::$tableFille . " on " . self::$tableFille . "." . self::$clePrimaireFille . "=" . self::$tableMere . "." . self::$clePrimaireMere . " ORDER BY note DESC LIMIT 10;");
        $stmt->execute();
        $result = $stmt->fetchAll();
        $listeJeux = array();
        foreach ($result as $value) {
            $nbjoueeursdao = new NombreJoueursDAO();
            $nbJoueurs = $nbjoueeursdao->find($value['id_nb_joueurs']);
            $daoage = new TrancheAgeDAO();
            $age = $daoage->find($value['id_age']);
            $daoduree = new DureeDAO();
            $duree = $daoduree->find($value['id_duree']);
            $daocat = new CategorieDAO();
            $lesCat = $daocat->findAll($value['id_jeu']);
            $newjeu = new Jeu($value['id_jeu'], $value['nom'], $value['descriptif'], $value['etat'], $value['note'], $value['date_ajout'], $value['image'], $nbJoueurs, $age, $duree, $lesCat);
            $listeJeux[] = $newjeu;
        }
        return $listeJeux;
    }

    //permet de retrouver les demandes d'ajout de jeu
    public function getJeuxInvalides() {
        $stmt = Connexion::prepare("select * from " . self::$tableMere . " inner join " . self::$tableFille . " on " . self::$tableFille . "." . self::$clePrimaireFille . "=" . self::$tableMere . "." . self::$clePrimaireMere . " WHERE " . self::$tableFille . ".is_valide=0 ORDER BY " . self::$tableMere . ".date_ajout;");
        $stmt->execute();
        $result = $stmt->fetchAll();
        $listeJeux = array();
        foreach ($result as $value) {
            $nbjoueeursdao = new NombreJoueursDAO();
            $nbJoueurs = $nbjoueeursdao->find($value['id_nb_joueurs']);
            $daoage = new TrancheAgeDAO();
            $age = $daoage->find($value['id_age']);
            $daoduree = new DureeDAO();
            $duree = $daoduree->find($value['id_duree']);
            $daocat = new CategorieDAO();
            $lesCategories = $daocat->findAll($value['id_jeu']);
            $newjeu = new Jeu($value['id_jeu'], $value['nom'], $value['descriptif'], $value['etat'], $value['note'], $value['date_ajout'], $value['image'], $nbJoueurs, $age, $duree, $lesCategories);
            $listeJeux[] = $newjeu;
        }
        return $listeJeux;
    }

}
