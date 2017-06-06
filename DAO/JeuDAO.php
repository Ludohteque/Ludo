<?php

require_once 'Modele/Jeu.php';

class JeuDAO extends DAO {

    private static $tableMere = "produit";
    private static $clePrimaireMere = "id_produit";
    private static $tableFille = "jeu";
    private static $clePrimaireFille = "id_jeu";
    private static $dateAjout = "date_ajout";

    public function create($obj) {
        $descriptif = $obj->getDescriptif();
        $etat = $obj->getEtat();
        $nomjeu = $obj->getNomJeu();
        $dateajouter = $obj->getDateAjout()->format('Y-m-d H:i:s');
        $image = $obj->getImage();
        $stmt = Connexion::prepare("insert into " . self::$tableMere . " (note, descriptif, etat, nom, date_ajout, image) values (3,?,?,?,?,?);"); ///note par défaut : 3
        $stmt->bindParam(1, $descriptif);
        $stmt->bindParam(2, $etat);
        $stmt->bindParam(3, $nomjeu);
        $stmt->bindParam(4, $dateajouter);
        $stmt->bindParam(5, $image);
        $stmt->execute();
        $id = Connexion::getInstance()->dernierIdInsere(self::$clePrimaireMere, self::$tableMere);
        $nbjoueurs = $obj->getNbJoueurs();
        $age = $obj->getIdAge();
        $duree = $obj->getIdDuree();
        $stmt2 = Connexion::prepare("insert into " . self::$tableFille . " (id_jeu, id_nb_joueurs, id_age, is_valide, id_duree) values (?,?,?,0,?);"); //id  = last+1 ; is_valide = 0
        $stmt2->bindParam(1, $id);
        $stmt2->bindParam(2, $nbjoueurs);
        $stmt2->bindParam(3, $age);
        $stmt2->bindParam(4, $duree);
        $stmt2->execute();
        foreach ($obj->getLesCategories() as $unecategorie) {

            $stmt4 = Connexion::prepare("insert into jeucategorie (id_jeu, nom_categorie) values (?, ?)");
            $stmt4->bindParam(1, $id);
            $stmt4->bindParam(2, $unecategorie);
            $stmt4->execute();
        }
        $obj->setIdJeu($id);
        //$obj->setIdProduit($id);
    }

    public function delete($obj) {
        $image = $obj->getImage();
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
        $lesCat = $daocat->findAllByJeu($result['id_jeu']);
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
        $lesCat = $daocat->findAllByJeu($result['id_jeu']);
        $jeu = new Jeu($result['id_jeu'], $result['nom'], $result['descriptif'], $result['etat'], $result['note'], $result['date_ajout'], $result['image'], $nbJoueurs, $age, $duree, $lesCat);
        return $jeu;
    }

    public function update($obj) {
        $id = $obj->getIdJeu();
        $descriptif = $obj->getDescriptif();
        $etat = $obj->getEtat();
        $nomjeu = $obj->getNomJeu();
        $dateajouter = $obj->getDateAjout(); //->format('Y-m-d H:i:s');
        $image = $obj->getImage();
        $note = $obj->getNote();
        $nbjoueurs = $obj->getNbJoueurs();
        $age = $obj->getIdAge();
        $duree = $obj->getIdDuree();
        $stmt = Connexion::prepare("update " . self::$tableFille . " set id_age=".$age.", id_nb_joueurs=".$nbjoueurs.", id_duree=".$duree." where " . self::$clePrimaireFille . "=" . $id . ";");
        $stmt->execute();
        $stmt2 = Connexion::prepare("update " . self::$tableMere . " set nom=\"".$nomjeu."\", etat=\"".$etat."\", note=".$note.", descriptif=\"".$descriptif."\", date_ajout=".$dateajouter.", image=\"".$image."\" where " . self::$clePrimaireMere . "=" . $id . ";");
        $stmt2->execute();
        $lescategories = $obj->getLesCategories();
        
        foreach ($lescategories as $unecategorie) {
            $stmt3 = Connexion::Prepare("select * from jeucategorie where id_jeu = " . $id . " and nom_categorie like '" . $unecategorie . "';");
            $stmt3->execute();
            $result = $stmt3->fetch();
            if ($result == false) {
                
                $stmt4 = Connexion::prepare("insert into jeucategorie (id_jeu, nom_categorie) values (?, ?);");
                
                $stmt4->bindParam(1, $id);
                $stmt4->bindParam(2, $unecategorie);
                $stmt4->execute();
            }
        }
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
            $lesCat = $daocat->findAllByJeu($value['id_jeu']);
            $newjeu = new Jeu($value['id_jeu'], $value['nom'], $value['descriptif'], $value['etat'], $value['note'], $value['date_ajout'], $value['image'], $nbJoueurs, $age, $duree, $lesCat);
            $listeJeux[] = $newjeu;
        }
        return $listeJeux;
    }

    public function getNouveautes($limite) {
                if ($limite){
            $lim = 'LIMIT 10';
        }else{
            $lim = '';
        }
           
        $stmt = Connexion::prepare("select * from " . self::$tableMere . " inner join " . self::$tableFille . " on " . self::$tableFille . "." . self::$clePrimaireFille . "=" . self::$tableMere . "." . self::$clePrimaireMere . " ORDER BY " . self::$dateAjout . " DESC ".$lim.";");
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
            $lesCat = $daocat->findAllByJeu($value['id_jeu']);
            $newjeu = new Jeu($value['id_jeu'], $value['nom'], $value['descriptif'], $value['etat'], $value['note'], $value['date_ajout'], $value['image'], $nbJoueurs, $age, $duree, $lesCat);
            $listeJeux[] = $newjeu;
        }
        return $listeJeux;
    }

    // renvoie une liste d'objet Jeu
    public function getPopulaires($limite) {
        if ($limite){
            $lim = 'LIMIT 10';
        }else{
            $lim = '';
        }
        $stmt = Connexion::prepare("select * from " . self::$tableMere . " inner join " . self::$tableFille . " on " . self::$tableFille . "." . self::$clePrimaireFille . "=" . self::$tableMere . "." . self::$clePrimaireMere . " ORDER BY note DESC ".$lim.";");
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
            $lesCat = $daocat->findAllByJeu($value['id_jeu']);
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
            $lesCategories = $daocat->findAllByJeu($value['id_jeu']);
            $newjeu = new Jeu($value['id_jeu'], $value['nom'], $value['descriptif'], $value['etat'], $value['note'], $value['date_ajout'], $value['image'], $nbJoueurs, $age, $duree, $lesCategories);
            $listeJeux[] = $newjeu;
        }
        return $listeJeux;
    }

    public function valideAjout($obj) {
        $id = $obj->getIdJeu();
        $stmt = Connexion::prepare("UPDATE " . self::$tableFille . " SET is_valide = 1 WHERE " . self::$clePrimaireFille . " = " . $id . ";");
        $stmt->execute();
    }
    
    public function getListeJeuxValides() {
        $stmt = Connexion::prepare("select * from " . self::$tableMere . " inner join " . self::$tableFille . " on " . self::$tableFille . "." . self::$clePrimaireFille . "=" . self::$tableMere . "." . self::$clePrimaireMere . " WHERE " . self::$tableFille . ".is_valide=1 ;");
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
            $lesCategories = $daocat->findAllByJeu($value['id_jeu']);
            $newjeu = new Jeu($value['id_jeu'], $value['nom'], $value['descriptif'], $value['etat'], $value['note'], $value['date_ajout'], $value['image'], $nbJoueurs, $age, $duree, $lesCategories);
            $listeJeux[] = $newjeu;
        }
        return $listeJeux;
    }

    // public function fileupload() {
//        if (isset($_FILES['image'])) {
//            //$_FILES existe on récupère les infos qui nous intéressent
//            $fichier = $_FILES['image']['name']; //nom réel de l'image
//            $size = $_FILES['image']['size']; //poids de l'image en octets
//            $tmp = $_FILES['image']['tmp_name']; //nom temporaire de l'image (sur le serveur)
//            $type = $_FILES['image']['type']; //type de l'image
//            $error = $_FILES['image']['error'];
//            $resultat = $this->up_error($error, $fichier);
//            //$nom_final=" ";
//            if ($resultat[0] === true) {
//                //On récupère la taille de l'image
//                list($width, $height) = getimagesize($tmp);
//                if (is_uploaded_file($tmp)) { //permet de vérifier si le fichier a été uploadé via http
//                    //vérification du type de l'img, son poids et sa taille
//                    if ($type == "image/jpeg" | $type == "image/png" | $type == "image/gif" && $size <= "26214400" && $width <= "4000" && $height <= "4000") {
//                        // type tout type d'images, poids < à 26214400 octets soit environ 25Mo, largeur = hauteur = 4000px
//                        //Pour supprimer les espaces dans les noms de fichiers car celà entraîne une erreur lorsque vous voulez l'afficher
//                        $fichier = preg_replace("` `i", "", $fichier); //ligne facultative :)
//                        //On vérifie s'il existe une image qui a le même nom dans le répertoire
//                        if (file_exists('Vue/img/jeu/' . $fichier)) {
//                            touch($fichier);
//                        }
//                        /* 	Le fichier existe on rajoute dans son nom le timestamp du moment pour le différencier de la première (comme cela on est sur de ne pas avoir 2 images avec le même nom :) )
//                          $nom_final= preg_replace("`.*`is",date("U").".*",$fichier);
//                          }
//                          else {
//                          $nom_final=$fichier; //l'image n'existe pas on garde le même nom
//                          } */
//                        //on déplace l'image dans le répertoire final
//                        move_uploaded_file($tmp, 'Vue/img/jeu/' . $fichier);
//                        //Message indiquant que tout s'est bien passé
//                    } else {
//                        //Le type mime, ou la taille ou le poids est incorrect
//                        echo 'Votre image a été rejetée (poids, taille ou type incorrect)';
//                }
//                } else {
//                    echo $resultat[1], '<br />';
//                }
//            }
//        }
//        // Constantes
//        define('TARGET', 'Vue/img/jeu/');    // Repertoire cible
//        define('MAX_SIZE', 300000);    // Taille max en octets du fichier
//        define('WIDTH_MAX', 3000);    // Largeur max de l'image en pixels
//        define('HEIGHT_MAX', 3000);    // Hauteur max de l'image en pixels
//// Tableaux de donnees
//        $tabExt = array('jpg', 'gif', 'png', 'jpeg');    // Extensions autorisees
//        $infosImg = array();
//
//// Variables
//        $extension = '';
//        $message = '';
//        $nomImage = '';
//
//        if (!empty($_POST)) {
//            // On verifie si le champ est rempli
//            if (!empty($_FILES['image']['name'])) {
//                // Recuperation de l'extension du fichier
//                $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
//
//                // On verifie l'extension du fichier
//                if (in_array(strtolower($extension), $tabExt)) {
//                    // On recupere les dimensions du fichier
//                    $infosImg = getimagesize($_FILES['image']['tmp_name']);
//
//                    // On verifie le type de l'image
//                    if ($infosImg[2] >= 1 && $infosImg[2] <= 14) {
//                        // On verifie les dimensions et taille de l'image
//                        if (($infosImg[0] <= WIDTH_MAX) && ($infosImg[1] <= HEIGHT_MAX) && (filesize($_FILES['image']['tmp_name']) <= MAX_SIZE)) {
//                            // Parcours du tableau d'erreurs
//                            if (isset($_FILES['image']['error']) && UPLOAD_ERR_OK === $_FILES['image']['error']) {
//                                // On renomme le fichier
//                                $nomImage = md5(uniqid()) . '.' . $extension;
//
//                                // Si c'est OK, on teste l'upload
//                                if (move_uploaded_file($_FILES['image']['tmp_name'], TARGET . $nomImage)) {
//                                    $message = 'Upload réussi !';
//                                } else {
//                                    // Sinon on affiche une erreur systeme
//                                    $message = 'Problème lors de l\'upload !';
//                                }
//                            } else {
//                                $message = 'Une erreur interne a empêché l\'uplaod de l\'image';
//                            }
//                        } else {
//                            // Sinon erreur sur les dimensions et taille de l'image
//                            $message = 'Erreur dans les dimensions de l\'image !';
//                        }
//                    } else {
//                        // Sinon erreur sur le type de l'image
//                        $message = 'Le fichier à uploader n\'est pas une image !';
//                    }
//                } else {
//                    // Sinon on affiche une erreur pour l'extension
//                    $message = 'L\'extension du fichier est incorrecte !';
//                }
//            } else {
//                // Sinon on affiche une erreur pour le champ vide
//                $message = 'Veuillez remplir le formulaire svp !';
//            }
//        } return $nomImage;
//    }

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
