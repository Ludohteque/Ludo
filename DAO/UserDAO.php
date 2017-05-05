<?php

require_once 'Modele/User.php';

class UserDAO extends DAO {

    private static $table = "user";
    private static $id = "id_user";

    //verifuser(ifexist) et connect user


    public function create($obj) {
        $pseudo = $obj->getPseudo();
        $ville = $obj->getVille();
        $mail = $obj->getMail();
        $tel = $obj->getTel();
        $mdp = $obj->getMdp();

        $stmt = Connexion::prepare("INSERT INTO " . self::$table . " (pseudo, ville, adr_mail, tel, mdp) "
                        . "VALUES (?, ?, ?, ?, ?)");
        $stmt->bindParam(1, $pseudo);
        $stmt->bindParam(2, $ville);
        $stmt->bindParam(3, $mail);
        $stmt->bindParam(4, $tel);
        $stmt->bindParam(5, $mdp);
        $stmt->execute();
    }

    public function delete($obj) {
        $idCourant = $obj->getId();
        $stmt = Connexion::prepare("DELETE FROM " . self::$table . " WHERE " . self::$id . " = " . $idCourant . ";");
        $stmt->execute();
    }

    public function find($id) {
        $stmt = Connexion::prepare("SELECT * FROM " . self::$table . " WHERE " . self::$id . " = " . $id . ";");
        $stmt->execute();
        $d = $stmt->fetch();
        $user = new User($d["id_user"], $d["pseudo"], $d["ville"], $d["adr_mail"], $d["tel"], $d["is_admin"], $d["is_bureau"], $d["mdp"], $d["moyenne"], $d["nbBan"], $d["enBan"], $d["nb_notes"]);
        return $user;
    }

    public function findParPseudo($pseudo) {
        $stmt = Connexion::prepare("SELECT * FROM " . self::$table . " WHERE pseudo = '" . $pseudo . "';");
        $stmt->execute();
        $d = $stmt->fetch();
        if ($d != 0) {
            $user = new User($d["id_user"], $d["pseudo"], $d["ville"], $d["adr_mail"], $d["tel"], $d["is_admin"], $d["is_bureau"], $d["mdp"], $d["moyenne"], $d["nbBan"], $d["enBan"], $d["nb_notes"]);
        } else {
            $user = null;
        }
        return $user;
    }

    public function update($obj) {

        $pseudo = $obj->getPseudo();
        $ville = $obj->getVille();
        $mail = $obj->getMail();
        $tel = $obj->getTel();
        $isAdmin = $obj->IsAdmin();
        $isBureau = $obj->isBureau();
        $mdp = $obj->getMdp();
        $moyenne = $obj->getNoteUser();
        $nbBan = $obj->getNbBan();
        $enBan = $obj->getEnBan();
        $idUser = $obj->getId_user();
        $nb_notes = getNbNotes();

        $stmt = Connexion::prepare("UPDATE " . self::$table . " SET pseudo='?', ville='?', adr_mail='?', tel='?',"
                        . "is_admin='?', is_bureau='?', mdp='?', moyenne='?', nbBan='?', enBan='?', nb_notes='?' WHERE id='?' ; ");

        $stmt->bindParam(1, $pseudo);
        $stmt->bindParam(2, $ville);
        $stmt->bindParam(3, $mail);
        $stmt->bindParam(4, $tel);
        $stmt->bindParam(5, $isAdmin);
        $stmt->bindParam(6, $isBureau);
        $stmt->bindParam(7, $mdp);
        $stmt->bindParam(8, $moyenne);
        $stmt->bindParam(9, $nbBan);
        $stmt->bindParam(10, $enBan);
        $stmt->bindParam(11, $nb_notes);
        $stmt->bindParam(12, $idUser);

        $stmt->execute();
    }

    public function pseudoExist($pseudo) {
        $succes = false;
        $user = self::findParPseudo($pseudo);
        if ($user !== null) {
            $succes = true;
        }
        return $succes;
    }

    public function mailExist($mail) {
        $succes = false;
        $stmt = Connexion::prepare("SELECT * FROM " . self::$table . " WHERE $mail = '" . $mail . "';");
        $stmt->execute();
        $d = $stmt->fetch();
        if ($d != 0) {
            $succes = true;
        }
        return $succes;
    }

    public function connect($idUser, $pseudo, $mdp) {
        $_SESSION['user'] = $pseudo;
        $_SESSION['mdp'] = $mdp;
    }

    public function deconnect() {
        $_SESSION = array();
        session_destroy();
    }

    public function getInfosJoueur($login, $mdp) {

        $stmt = Connexion::prepare("SELECT * FROM " . self::$table . " WHERE pseudo = '" . $login . "' AND mdp = '" . $mdp . "';");
        $stmt->execute();
        $d = $stmt->fetch();
        if ($d != 0) {
            $user = new User($d["id_user"], $d["pseudo"], $d["ville"], $d["adr_mail"], $d["tel"], $d["is_admin"], $d["is_bureau"], $d["mdp"], $d["moyenne"], $d["nbBan"], $d["enBan"], $d["nb_notes"]);
        } else {
            $user = null;
        }
        return $user;
    }

    public function estConnecte() {
        return isset($_SESSION['pseudo']);
    }
    
    public function isAdmin() {
        return isset($_SESSION['admin']) && $_SESSION['admin']==1;
    }

}
