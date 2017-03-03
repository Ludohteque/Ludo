<?php

require_once 'Modele/Exemplaire.php';

class ExemplaireDAO extends DAO{
    
    //find exemplaire par idJeu et selon idUser (findParIdJeu et findParIdUser)
   

    private static $table="exemplaire";
    private static $id="id_exemplaire";
    
    public function create($idJeu, $idUser, $etat, $disponibilite) {
        $stmt = Connexion::prepare("INSERT INTO ".self::$table." (id_jeu, id_user, etat, disponibilite) "
                . "VALUES (?, ?, ?, ?)");
    	$stmt->bindParam(1, $idJeu);
        $stmt->bindParam(2, $idUser);
        $stmt->bindParam(3, $etat);
        $stmt->bindParam(4, $disponibilite);
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
        $stmt = Connexion::prepare("SELECT J. FROM ".self::$table." WHERE id_user = ".$idUser.";");
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
    
    public function findUserExemplaires($user){
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
    
    public function findMesJeux($id_user) {
        $listeJeuxUser = array();
        $tuple=array();
        $requete = "SELECT P.note, P.nom, JC.nom_categorie, TA.agemin, TA.agemax, P.image FROM ".self::$table." E INNER JOIN produit P ON E.id_jeu=P.id_produit INNER JOIN jeu J on P.id_produit=J.id_jeu INNER JOIN jeucategorie JC ON J.id_jeu=JC.id_jeu INNER JOIN trancheage TA ON J.id_age=TA.id_age WHERE E.id_user=".$iduser.";";
        $stmt = Connexion::prepare($requete);
        $tuples = $stmt->fetchAll();
        foreach ($tuples as $jeu) {
            $tuple[]=$jeu;
            $listeJeuxUser[] = $tuple;
        }
        return $listeJeuxUser;        
    }
}
