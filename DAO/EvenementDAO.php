<?php

require_once 'Modele/Evenement.php';

class EvenementDAO extends DAO {

    private static $table = "evenement";
    private static $clePrimaire = "id_evenement";
    private static $cleDate = "date_ajout";

    public function create($obj) {
        $even = $obj->getEvenement();
        $image = $obj->getLien();
        $titre = $obj->getTitre();
        $dateajout = $obj->getDateAjout()->format('Y-m-d H:i:s');
        $stmt = Connexion::prepare("INSERT INTO " . self::$table . " (evenement, lien_image, titre, date_ajout) " . "VALUES (?, ?, ?, ?)");
        $stmt->bindParam(1, $even);
        $stmt->bindParam(2, $image);
        $stmt->bindParam(3, $titre);
        $stmt->bindParam(4, $dateajout);
        $stmt->execute();
    }

    public function delete($obj) {

        $idEvenement = $obj->getIdEvenement();

        $stmt = Connexion::prepare("DELETE FROM " . self::$table . " WHERE " . self::$cleprimaire . " = " . $idEvenement . ";");
        $stmt->execute();
    }

    public function find($id) {
        $stmt = Connexion::prepare("SELECT * FROM " . self::$table . " WHERE " . self::$clePrimaire . " = " . $id . ";");
        $stmt->execute();
        $d = $stmt->fetch();
        $evenement = new Evenement($d["id_evenement"], $d["evenement"], $d["lien_image"], $d["titre"], $d["date_ajout"]);

        return $evenement;
    }

    public function findByEvenement($evenement) {
        $stmt = Connexion::prepare("SELECT * FROM " . self::$table . " WHERE evenement =" . $evenement . " = " . ";");
        $stmt->execute();
        $d = $stmt->fetch();
        $ObjEvenement = new Evenement($d["id_evenement"], $d["evenement"], $d["lien_image"]);

        return $ObjEvenement;
    }

    public function update($obj) {
        $evenement = $obj->getEvenement();
        $lienImage = $obj->getLien();
        $idEvenement = $obj->getIdEvenement();
        $titre = $obj->getTitre();

        $stmt = Connexion::prepare('UPDATE ' . self::$table . ' SET evenement="'.$evenement.'", lien_image="'.$lienImage.'", titre="'.$titre.'"  WHERE id_evenement="'.$idEvenement.'";' );

//        $stmt->bindParam(1, $evenement);
//        $stmt->bindParam(2, $lienImage);
//        $stmt->bindParam(3, $idEvenement);
        $stmt->bindParam(4, $titre);

        $stmt->execute();
    }

    public function findDernierEvenement() { //select * from evenement order by date_ajout desc limit 4 ".$this->clePrimare."
        $listeEven = array();
        $stmt = Connexion::prepare("SELECT * FROM " . self::$table . " ORDER BY " . self::$cleDate . " DESC LIMIT 4;");
        $stmt->execute();
        $resultats = $stmt->fetchAll();
        if ($resultats != 0) {
            foreach ($resultats as $unResultat) {
                $evenement = new Evenement($unResultat["id_evenement"], $unResultat["evenement"], $unResultat["lien_image"], $unResultat["titre"], $unResultat["date_ajout"]);
                $listeEven[] = $evenement;
            }
        }
        return $listeEven;
    }

    public function findAll() {
        $stmt = Connexion::prepare("SELECT * FROM " . self::$table . ";");
        $stmt->execute();
        $resultats = $stmt->fetchAll();
        $reponse = array();
        if ($resultats != 0) {
            foreach ($resultats as $resultat) {
                $evenement = new Evenement($resultat["id_evenement"], $resultat["evenement"], $resultat["lien_image"], $resultat["titre"], $resultat["date_ajout"]);
                $reponse[] = $evenement;
            }
        }
        return $reponse;
    }

}
