<?php

class JeuDAO extends DAO {
    
    private $tableMere = "produit";
    private $clePrimaireMere = "id_produit";
    private $tableFille = "jeu";
    private $clePrimaireFille = "id_jeu";
    
    protected function create($obj) {
        $req = "insert into ".$this->tableMere." (nom, descriptif, etat) values(".$obj->getNom().",".$obj->getDescriptif().",".$obj->getEtat().");";
	PdoLudo::$monPdo->query($req);
        // TODO récupérer id du produit à insérer dans table jeu
        $req = "insert into ".$this->tableFille." (nb_joueurs,id_age,id_categorie,inventaire,id_duree,date_ajout) values (".$obj->getNbJoueurs().","
                .$obj->getIdAge.",".$obj->getIdCat.",".$obj->getInventaire.",".$obj->getIdDuree.",".$obj->getDateAjout().")";
        PdoLudo::$monPdo->query($req);
    }

    protected function delete($obj) {
        $req = "delete from ".$this->tableFille." where ".$this->clePrimaireFille." = ".$obj->getIdJeu().";";
        PdoLudo::$monPdo->query($req);
        $req = "delete from ".$this->tableMere." where ".$this->clePrimaireMere." = ".$obj->getIdProduit().";";
        PdoLudo::$monPdo->query($req);
    }

    protected function find($obj) {
        //TODO
    }

    protected function update($obj) {
        //TODO
    }

}
