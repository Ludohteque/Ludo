<?php

require_once 'Modele/Jeu.php';

class JeuDAO extends DAO {

    private static $tableMere = "produit";
    private static $clePrimaireMere = "id_produit";
    private static $tableFille = "jeu";
    private static $clePrimaireFille = "id_jeu";
    private static $dateAjout = "date_ajout";

    public function create($obj) {
        $nomjeu = $obj->getNomJeu();
        $descriptif = $obj->getDescriptif();
        $etat = $obj->getEtat();
        $age = $obj->getIdAge();
        $duree = $obj->getIdDuree();
        $nbjoueurs = $obj->getNbJoueurs();
        $categories = $obj->getLesCategories();
        $isvalide = 0;
        $stmt = Connexion::prepare("insert into " . self::$tableMere . " (note, descriptif, etat, nom) values (3,?,?,?);");
        $stmt->bindParam(1, $descriptif);
        $stmt->bindParam(2, $etat);
        $stmt->bindParam(3, $nomjeu);
        $stmt->execute();
        $id = Connexion::getInstance()->dernierIdInsere(self::$clePrimaireMere, self::$tableMere);
        //$id = $idtemp +1;
        
        $stmt2 = Connexion::prepare("insert into " . self::$tableFille . " (id_jeu, nb_joueurs, id_age, is_valide, id_duree) values (?+1,?,?,0,?);");
//        $stmt2 = Connexion::prepare("insert into " . self::$tableFille . " (nb_joueurs, id_age, is_valide, id_duree) values (?,?,0,?);");
        $stmt2->bindParam(1, $id);
        $stmt2->bindParam(2, $nbjoueurs);
        $stmt2->bindParam(3, $age);
        //$stmt2->bindParam(4, 0);
        $stmt2->bindParam(4, $duree);
        $stmt2->execute();
        foreach ($categories as $unecategorie) {
            $stmt3 = Connexion::prepare("insert into jeucategorie (id_jeu, nom_categorie) values (?, ?)");
            $stmt3->bindParam(1, $id);
            $stmt3->bindParam(2, $unecategorie);
            $stmt3->execute();
        }
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
    
    public function findParNom($nom) {
        $stmt = Connexion::prepare("select * from " . self::$tableFille . " "
                        . "inner join " . self::$tableMere . " on " . self::$tableFille . "." . self::$clePrimaireFille . "=" . self::$tableMere . "." . self::$clePrimaireMere . " "
                        . "where " . self::$tableMere . ".nom = '" . $nom . "';");
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
    
    public function getAll() {
        $stmt = Connexion::prepare("select * from " . self::$tableMere . " inner join " . self::$tableFille . " on " . self::$tableFille . "." . self::$clePrimaireFille . "=" . self::$tableMere . "." . self::$clePrimaireMere . " ORDER BY " . self::$dateAjout . ";");
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

    public function fileupload() {
        if (isset($_FILES['image'])) {
            //$_FILES existe on récupère les infos qui nous intéressent
            $fichier = $_FILES['image']['name']; //nom réel de l'image
            $size = $_FILES['image']['size']; //poids de l'image en octets
            $tmp = $_FILES['image']['tmp_name']; //nom temporaire de l'image (sur le serveur)
            $type = $_FILES['image']['type']; //type de l'image
            $error = $_FILES['image']['error'];
            $resultat = $this->up_error($error, $fichier);
            //$nom_final=" ";
            if ($resultat[0] === true) {
                //On récupère la taille de l'image
                list($width, $height) = getimagesize($tmp);
                if (is_uploaded_file($tmp)) { //permet de vérifier si le fichier a été uploadé via http
                    //vérification du type de l'img, son poids et sa taille
                    if ($type == "image/jpeg" | $type == "image/png" | $type == "image/gif" && $size <= "26214400" && $width <= "4000" && $height <= "4000") {
                        // type tout type d'images, poids < à 26214400 octets soit environ 25Mo, largeur = hauteur = 4000px
                        //Pour supprimer les espaces dans les noms de fichiers car celà entraîne une erreur lorsque vous voulez l'afficher
                        $fichier = preg_replace("` `i", "", $fichier); //ligne facultative :)
                        //On vérifie s'il existe une image qui a le même nom dans le répertoire
                        if (file_exists('Vue/img/jeu/' . $fichier)) {
                            touch($fichier);
                        }
                        /* 	Le fichier existe on rajoute dans son nom le timestamp du moment pour le différencier de la première (comme cela on est sur de ne pas avoir 2 images avec le même nom :) )
                          $nom_final= preg_replace("`.*`is",date("U").".*",$fichier);
                          }
                          else {
                          $nom_final=$fichier; //l'image n'existe pas on garde le même nom
                          } */
                        //on déplace l'image dans le répertoire final
                        move_uploaded_file($tmp, 'Vue/img/jeu/' . $fichier);
                        //Message indiquant que tout s'est bien passé
                        echo "L'image a été envoyée avec succès<br/>";
                    } else {
                        //Le type mime, ou la taille ou le poids est incorrect
                        echo 'Votre image a été rejetée (poids, taille ou type incorrect)';
                    }
                } else {
                    echo $resultat[1], '<br />';
                }
            }
        }
    }

    function up_error($code, $nom) {
        switch ($code) {
            case UPLOAD_ERR_OK : $erreur = 'Pas d\'erreur';
                $valid = true;
                break;
            case UPLOAD_ERR_INI_SIZE : $erreur = 'Votre fichier `' . $nom . '` dépasse la taille maximale d\'upload autorisée par PHP( ' . get_cfg_var('upload_max_filesize') . ' )';
                $valid = false;
                break;
            case UPLOAD_ERR_FORM_SIZE : $erreur = 'Votre fichier dépasse la taille maximale demandée par le Webmestre';
                $valid = false;
                break;
            case UPLOAD_ERR_PARTIAL : $erreur = 'Le fichier n\'a été que partiellement téléchargé. !!!';
                $valid = false;
                break;
            case UPLOAD_ERR_NO_FILE : $erreur = 'Aucun fichier téléchargé !!!';
                $valid = false;
                break;
            case UPLOAD_ERR_NO_TMP_DIR : $erreur = 'Un dossier temporaire est manquant.';
                $valid = false;
                break;
            case UPLOAD_ERR_CANT_WRITE : $erreur = 'Échec de l\'écriture du fichier sur le disque.';
                $valid = false;
                break;
            case UPLOAD_ERR_EXTENSION : $erreur = 'Une extension PHP a arrété l\'envoi de fichier. PHP ne propose aucun moyen de déterminer quelle extension est en cause. L\'examen du phpinfo() peut aider.';
                $valid = false;
                break;
            default : $erreur = 'L\'upload a rencontré une erreur inconnue !!!';
                $valid = false;
                break;
        }

        $return[] = $valid;
        $return[] = $erreur;
        return $return;
    }

}
