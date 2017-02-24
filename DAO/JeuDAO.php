<?php

class JeuDAO extends DAO {
    
    private $tableMere = "produit";
    private $clePrimaireMere = "id_produit";
    private $tableFille = "jeu";
    private $clePrimaireFille = "id_jeu";
    
    protected function create($obj) {
        $stmt = Connexion::getInstance()->prepare("insert into ".$this->tableMere." (nom, descriptif, etat) values (?,?,?);");
        $stmt->bindParam(1, $obj->getNomJeu());
        $stmt->bindParam(2, $obj->getDescriptif());
        $stmt->bindParam(3, $obj->getEtat());
        $stmt->execute();
        $id = Connexion::getInstance()->lastInsertId();
        $stmt = Connexion::getInstance()->prepare("insert into ".$this->tableFille." (id_jeu, id_age, id_categorie, id_duree, nb_joueurs) values (?,?,?,?,?);");
        $stmt->bindParam(1, $id);
        $stmt->bindParam(2, $obj->getIdAge());
        $stmt->bindParam(3, $obj->getIdCat());
        $stmt->bindParam(4, $obj->getIdDuree());
        $stmt->bindParam(5, $obj->getNbJoueurs());
        $stmt->execute();
        $obj->setIdJeu($id);
    }

    protected function delete($obj) {
        $stmt = Connexion::getInstance()->prepare("delete from ".$this->tableFille." where ".$this->clePrimaireFille." = ".$obj->getIdJeu().";");
        $stmt->execute();
        $stmt = Connexion::getInstance()->prepare("delete from ".$this->tableMere." where ".$this->clePrimaireMere." = ".$obj->getIdJeu().";");
        $stmt->execute();
    }

    protected function find($id) {
        $jeu = null;
        $stmt = Connexion::getInstance()->prepare("select * from ".$this->tableFille." inner join ".$this->tableMere." on ".$this->tableFille.$this->clePrimaireFille."=".$this->tableMere.$this->clePrimaireMere." where ".$this->tableFille.".".$this->clePrimaireFille." = ".$id->getIdJeu().";");
        $stmt->execute();
        $result = $stmt->fetch();
        $jeu = new Jeu($result['nom'], $result['nb_joueurs'], $result['id_age'], $result['id_categorie'], $result['descriptif'], $result['id_duree'], $result['date_ajout'], $result['etat'], $result['note']);
        return $jeu;
    }

    protected function update($obj) {
        
    }

}
