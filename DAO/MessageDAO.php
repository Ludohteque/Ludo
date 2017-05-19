<?php

require_once 'Modele/Message.php';

class MessageDAO extends DAO {

    private static $table = "message";
    private static $clePrimaire = "id_message";

    public function create($obj) {

        $corps = $obj->getCorps();
        $idExpediteur = $obj->getIdExpediteur()->getIdUser();
        $idDestinataire = $obj->getIdDestinataire()->getIdUser();
        $sujet = $obj->getSujet();
        $type = $obj->getType();
        $date = $obj->getDate();

        $req = Connexion::prepare("INSERT INTO " .self::$table. " (corps, id_expediteur, id_destinataire, sujet, type, date) VALUES (?, ?, ?, ?, ?, ?)");
        $req->bindParam(1, $corps);
        $req->bindParam(2, $idExpediteur);
        $req->bindParam(3, $idDestinataire);
        $req->bindParam(4, $sujet);
        $req->bindParam(5, $type);
        $req->bindParam(6, $date);
        $req->execute();
    }

    public function delete($obj) {
        $idMessage = $obj->getIdMessage();

        $req = Connexion::getInstance()->prepare("DELETE FROM " .self::$table. " WHERE " . self::$clePrimaire . " = " . $idMessage . ";");
        $req->execute();
    }

    public function find($id) {

        $req = Connexion::getInstance()->prepare("SELECT * FROM " .self::$table. " WHERE " . self::$clePrimaire . " = " . $id . ";");
        $req->execute();
        $d = $req->fetch();
        $message = new Message($d["id_message"], $d["corps"], $d["id_expediteur"], $d["id_destinataire"], $d["sujet"], $d["type"], $d["date"]);

        return $message;
    }

    public function update($obj) {

        $corps = $obj->getCorps();
        $idExpediteur = $obj->getIdExpediteur();
        $idDestinataire = $obj->getIdDestinataire();
        $sujet = $obj->getSujet();
        $type = $obj->getType();
        $idMessage = $obj->getIdMessage();

        $stmt = Connexion::getInstance()->prepare("UPDATE " .self::$table. " SET corps='?', idExpediteur='?', idDestinataire='?', sujet='?',"
                . "type='? WHERE id='?' ; ");

        $stmt->bindParam(1, $corps);
        $stmt->bindParam(2, $idExpediteur);
        $stmt->bindParam(3, $idDestinataire);
        $stmt->bindParam(4, $sujet);
        $stmt->bindParam(5, $type);
        $stmt->bindParam(6, $idMessage);

        $stmt->execute();
    }

    public function demandeAjout($obj) {
        $req = Connexion::getInstance()->prepare("SELECT * FROM " .self::$table. " m JOIN user u ON u.id_user = m.id_destinataire JOIN type t ON t.type_message = m.type WHERE t.type_message LIKE 'Demande ajout AND m.etat LIKE 'non_lu'';");

        $listeMessages = array();
        $req->execute();
        $d = $req->fetchAll();
        foreach ($d AS $unMessage) {
            $listeMessages[] = new Message($unMessage["id_message"], $unMessage["corps"], $unMessage["id_expediteur"], $unMessage["id_destinataire"], $unMessage["sujet"], $unMessage["type"]);
        }

        return $listeMessages;
    }

    public function demandeEmprunt($id, $type) {
        $stmt = Connexion::prepare("SELECT * FROM " . self::$table . " WHERE type LIKE '$type' AND (id_expediteur = " . $id . " OR id_destinataire = " . $id . ");");
        $stmt->execute();
        $result = $stmt->fetchAll();
        $listeMessages = array();
        foreach ($result as $unMessage) {
            $userdao = new UserDAO();
            $expediteur = $userdao->find($unMessage["id_expediteur"]);
            $destinataire = $userdao->find($unMessage["id_destinataire"]);
            $listeMessages[] = new Message($unMessage["id_message"], $unMessage["corps"], $expediteur, $destinataire, $unMessage["sujet"], $unMessage["type"], $unMessage["date"]);
        }
        return $listeMessages;
    }

    public function getMessagesSignalement() {
        //public function getMessagesSignalement($obj) {
        
        $req = Connexion::prepare("SELECT * FROM " .self::$table. " WHERE type LIKE 'Signalement';");
        $req->execute();
        $lesmessages = $req->fetchAll();
        $listeMessages = array();
        foreach ($lesmessages AS $unMessage) {
            $userdao = new UserDAO;
            $expediteur = $userdao->find($unMessage['id_expediteur']);
            $destinataire = $userdao->find($unMessage['id_destinataire']);
            $listeMessages[] = new Message($unMessage["id_message"], $unMessage["corps"], $expediteur, $destinataire, $unMessage["sujet"], $unMessage["type"], $unMessage["date"]);
        }
        return $listeMessages;
    }
    
        public function getDemandeAjout() {
    	$req = Connexion::prepare("SELECT u.pseudo, m.sujet, m.corps FROM " .self::$table. " m JOIN user u ON u.id_user = m.id_expediteur JOIN type t ON t.type_message = m.type WHERE t.type_message LIKE 'Demande d\'ajout';");
        $listeMessages = array();
        $req->execute();
        $lesmessages = $req->fetchAll();
        foreach ($lesmessages AS $unMessage) {
            $userdao = new UserDAO;
            $expediteur = $userdao->find($unMessage['id_expediteur']);
            $destinataire = $userdao->find($unMessage['id_destinataire']);
            $listeMessages[] = new Message($unMessage["id_message"], $unMessage["corps"], $expediteur, $destinataire, $unMessage["sujet"], $unMessage["type"], $unMessage["date"]);
        }
        return $listeMessages;
        
    }

}

?>
