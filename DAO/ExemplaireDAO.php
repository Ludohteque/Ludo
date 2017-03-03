<?php

require_once 'Modele/Exemplaire.php';

class ExemplaireDAO extends DAO{
    
    //find exemplaire par idJeu et selon idUser (findParIdJeu et findParIdUser)
   

    private static $table="exemplaire";
    private static $id="id_exemplaire";
    
    public function create($idJeu, $idUser, $etat) {
        $stmt = Connexion::prepare("INSERT INTO ".self::$table." (id_jeu, id_user, etat) "
                . "VALUES (?, ?, ?)");
    	$stmt->bindParam(1, $idJeu);
        $stmt->bindParam(2, $idUser);
        $stmt->bindParam(3, $etat);
        $stmt->execute();
     }
     
    public function findParIdJeu($idJeu) {
        $stmt = Connexion::prepare("SELECT * FROM ".self::$table." WHERE id_jeu = ".$idJeu.";");
        $stmt->execute();
        $d = $stmt->fetch();
        $exemplaire=new Exemplaire( $d["id_exemplaire"], $d["id_jeu"], $d["id_user"], $d["etat"], $d["disponibilite"]);
            
        return $exemplaire; 
        
    }
     
    public function findParIdUser($idUser) {
        $listeJeuxUser = array();
        $stmt = Connexion::prepare("SELECT * FROM ".self::$table." WHERE id_user = ".$idUser.";");
        $stmt->execute();
        $d = $stmt->fetch();
        foreach ($d as $exemplaire) {
            $exemplaire=new Exemplaire( $d["id_exemplaire"], $d["id_jeu"], $d["id_user"], $d["etat"], $d["disponibilite"]);
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
}
