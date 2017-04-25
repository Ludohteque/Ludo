<?php

require_once 'Modele/NombreJoueurs.php';

class NombreJoueursDAO extends DAO {
    
    private static $table = "nbjoueur";
    private static $clePrimaire = "id_nb_joueur";
    
    public function create($obj) {
        
    }

    public function delete($obj) {
        
    }

    public function find($id) {
        $stmt = Connexion::prepare("SELECT * FROM " .self::$table. " WHERE " .self::$clePrimaire. " = " . $id . ";");
        $stmt->execute();
        $d = $stmt->fetch();
        $nbJoueurs = new NombreJoueursDAO($d['id_nb_joueur'],$d['nb_joueur_min'],$d['nb_joueur_max']);
        return $nbJoueurs;
    }

    public function update($obj) {
        
    }

}
