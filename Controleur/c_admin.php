<?php

require_once ('DAO/UserDAO.php');
require_once ('DAO/JeuDAO.php');

if (!isset($_GET['action'])) {
    $_GET['action'] = 'admin';
}

$action = $_GET['action'];
switch ($action) {
    case "demandeAdmin":
        $messagedao = new MessageDAO();
        $jeudao = new JeuDAO();
        $signalements = $messagedao->getMessagesSignalement($_SESSION['id']);
        $renseignements = $messagedao->getRenseignements($_SESSION['id']);
        $demandesajout = $jeudao->getJeuxInvalides();
        include_once 'Vue/v_admin.php';
        break;
    case 'demandeNouveaujeu': {
            $demande = 0;
            include("Vue/v_nouveaujeu.php");
            break;
        }
    case 'valideNouveaujeu': {
            if (isset($_POST['nom']) && isset($_POST['descriptif']) && isset($_POST['etat']) && isset($_POST['age']) && isset($_POST['categories']) && isset($_POST['nbjoueurs']) && isset($_POST['duree']) && is_uploaded_file($_FILES['image']['tmp_name'])) {
                $nom = $_POST['nom'];
                $descriptif = $_POST['descriptif'];
                $etat = $_POST['etat'];
                $tranchedage = $_POST['age'];
                $categories = $_POST['categories'];
                $nbjoueurs = $_POST['nbjoueurs'];
                $duree = $_POST['duree'];
                $jeudao = new JeuDAO();
                if (is_uploaded_file($_FILES['image']['tmp_name'])) {
                    define('TARGET', 'Vue/img/jeu/');
                    fileupload();
                }
                $message = MESSAGE;
                $nomImage = NOM_IMAGE;
                $isvalide = 0;
                if ($message == 'Upload réussi !') {
                    $nouveaujeu = new jeu(-1, $nom, $descriptif, $etat, 3, new \DateTime(), $nomImage, $nbjoueurs, $tranchedage, $duree, $categories);
                    $jeudao->create($nouveaujeu);
                    //$resultat = "Votre jeu a bien été ajouté !";
                }//TODO
                $items = $jeudao->getAll();
                $titre = "jeux";
                if (UserDAO::estConnecte() && UserDAO::isAdmin()) {
                    include_once 'Vue/v_adminliste.php';
                } else {
                    $jeuDAO = new JeuDAO();
                    $empruntDAO = new EmpruntDAO();
                    $lesNouveautes = $jeuDAO->getNouveautes(True);
                    $lesPopulaires = $jeuDAO->getPopulaires(True);
                    $lesEmpruntes = $empruntDAO->getDerniersEmprunts(True);
                    include("Vue/v_main.php");                    
                }
            } else {
                $jeudao = new JeuDAO;
                $messagedao = new MessageDAO();
                $signalements = $messagedao->getMessagesSignalement($_SESSION['id']);
                $renseignements = $messagedao->getRenseignements($_SESSION['id']);
                $demandesajout = $jeudao->getJeuxInvalides();
                $resultat = "Ajout impossible ! il manque des informations !";
                include_once 'Vue/v_admin.php';
            }
            break;
        }

    case 'userAdmin': {
            $userdao = new UserDAO();
            $items = $userdao->findAll();
            $titre = "utilisateurs";
            include_once 'Vue/v_adminliste.php';
            break;
        }
        
    case 'banAdmin': {
            $userdao = new UserDAO();
            $items = $userdao->findBannis();
            $titre = "utilisateurs bannis";
            include_once 'Vue/v_adminliste.php';
            break;
        }
        
        case 'demandeBan': {
            $userdao = new UserDAO();
            $items = $userdao->find(Bannis($id));
            $titre = "utilisateurs bannis";
            include_once 'Vue/v_adminliste.php';
        break;
        }

        case 'deleteUser': {
            $userdao = new UserDAO();
            if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $user = $userdao->find($id);
            $userdao->delete($user);
            }
            $items = $userdao->findAll();
            $titre = "utilisateurs";
            include_once 'Vue/v_adminliste.php';
            break;
        }
        case 'deleteJeu': {
            if (isset($_GET['id'])) {
            $jeudao = new JeuDAO();
            $id = $_GET['id'];
            $jeu = $jeudao->find($id);
            $jeudao->delete($jeu);
            }
            $items = $jeudao->getAll();
            $titre = "jeux";
            include_once 'Vue/v_adminliste.php';
            break;
        }
        
        case 'modifDemandeJeu': {
            if (isset($_GET['id'])) {
            $jeudao = new JeuDAO();
            $id = $_GET['id'];
            $jeu = $jeudao->find($id);
            include_once 'Vue/v_admin_modifDemandeAjout.php';
            }
            break;
        }
        
        case 'okmodifDemandeJeu': {
            if (isset($_POST['nom']) && isset($_POST['descriptif']) && isset($_POST['etat']) && isset($_POST['age']) && isset($_POST['categories']) && isset($_POST['nbjoueurs']) && isset($_POST['duree'])) { //&& is_uploaded_file($_FILES['image']['tmp_name'])
                $id = $_GET['id'];
                $jeudao = new JeuDAO();
                $jeuoriginal = $jeudao->find($id);
                
                $jeuoriginal->setNom($_POST['nom']);
                $jeuoriginal->setDescriptif($_POST['descriptif']);
                $jeuoriginal->setEtat($_POST['etat']);
                $jeuoriginal->setIdAge($_POST['age']);
                $jeuoriginal->setLesCategories($_POST['categories']);
                $jeuoriginal->setNbJoueurs($_POST['nbjoueurs']);
                $jeuoriginal->setIdDuree($_POST['duree']);
                $message="";
                if (is_uploaded_file($_FILES['image']['tmp_name'])) {
                    define('TARGET', 'Vue/img/jeu/');
                    fileupload();
                    $message = MESSAGE;
                $nomImage = NOM_IMAGE;
                } else {
                    $nomImage = $jeuoriginal->getImage();
                }
                
                $isvalide = 0;
                //if ($message == 'Upload réussi !') { //valable sur create, pas sur update
                    //$nouveaujeu = new jeu($id, $nom, $descriptif, $etat, $note, $date, $nomImage, $nbjoueurs, $tranchedage, $duree, $categories);
                    $jeuoriginal->setImage($nomImage);
                    $jeudao->update($jeuoriginal);
                    //$resultat = "Votre jeu a bien été ajouté !";
                //}//TODO
                $items = $jeudao->getAll();
                $titre = "jeux";
                include_once 'Vue/v_adminliste.php';
            } else {
                $jeudao = new JeuDAO;
                $messagedao = new MessageDAO();
                $signalements = $messagedao->getMessagesSignalement($_SESSION['id']);
                $renseignements = $messagedao->getRenseignements($_SESSION['id']);
                $demandesajout = $jeudao->getJeuxInvalides();
                $resultat = "Ajout impossible ! il manque des informations !";
                include_once 'Vue/v_admin.php';
            }
            break;
        }
        
        case 'deleteAjout': {
            if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $jeu = $jeudao->find($id);
            $jeudao->delete($jeu);
            }
            $messagedao = new MessageDAO();
            $signalements = $messagedao->getMessagesSignalement($_SESSION['id']);
            $renseignements = $messagedao->getRenseignements($_SESSION['id']);
            $demandesajout = $jeudao->getJeuxInvalides();
            include_once 'Vue/v_admin.php';
            break;
        }
        
    case 'demModifEvenement' : {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $evenementdao = new EvenementDAO();
            $evenement = $evenementdao->find($id);
            include_once 'Vue/v_modifEvenement.php';
        }
        break;
    }
    
    case 'valideModifEven' : {
        if (isset($_GET['id']) && isset($_POST['evenement']) && isset($_POST['titre'])) {
            $id = $_GET['id'];
            $evenementdao = new EvenementDAO();
            $evenementOriginal = $evenementdao->find($id);
            $date = $evenementOriginal->getDateAjout();
            $evenementOriginal->setTitre($_POST['titre']);
            $evenementOriginal->setEvenement($_POST['evenement']);
            if (is_uploaded_file($_FILES['image']['tmp_name'])) {
                    define('TARGET', 'Vue/img/evenement/');
                    fileupload();
                    $nomImage = NOM_IMAGE;
                    $evenementOriginal->setLienImage($nomImage);
                    $message = MESSAGE;
                }
    
                
                //if ($message == 'Upload réussi !') {
                    //$evenementOriginal->setLienImage($nomImage);
                    $evenementdao->update($evenementOriginal);
                    $resultat = "Votre evenement a bien été ajouté !";
                    $items = $evenementdao->findAll();
                    $titre = "évènements";
                    include_once 'Vue/v_adminliste.php';
            //include_once 'Vue/v_modifEvenement.php';
                //}
        }
        break;
    }
                
    case 'effacerSignalement':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        
        $messagedao = new MessageDAO;
        $jeudao = new JeuDAO;
        $message = $messagedao->find($id);
        $messagedao->delete($message);
        }
        $signalements = $messagedao->getMessagesSignalement($_SESSION['id']);
        $renseignements = $messagedao->getRenseignements($_SESSION['id']);
        $demandesajout = $jeudao->getJeuxInvalides();
        include('Vue/v_admin.php');
        break;
        
        case 'effacerRenseignement':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        
        $messagedao = new MessageDAO;
        $jeudao = new JeuDAO;
        $message = $messagedao->find($id);
        $messagedao->delete($message);
        }
        $signalements = $messagedao->getMessagesSignalement($_SESSION['id']);
        $renseignements = $messagedao->getRenseignements($_SESSION['id']);
        $demandesajout = $jeudao->getJeuxInvalides();
        include('Vue/v_admin.php');
        break;
        
        case 'debanUser': {
            $userdao = new UserDAO();
            $id = $_GET['id'];
            $user = $userdao->find($id);
            $userdao->deban($user);
            $items = $userdao->findAll();
            $titre = "utilisateurs";
            include_once 'Vue/v_adminliste.php';
            break;
        }
        
        case 'banUser': {
            $userdao = new UserDAO();
            $id = $_GET['id'];
            $user = $userdao->find($id);
            $userdao->banUser($user);
            $items = $userdao->findAll();
            $titre = "utilisateurs";
            include_once 'Vue/v_adminliste.php';
            break;
        }

    case 'jeuxAdmin': {
            $jeudao = new JeuDAO();
            $items = $jeudao->getListeJeuxValides();
            $titre = "jeux";
            include_once 'Vue/v_adminliste.php';
            break;
        }

    case 'evenementsAdmin': {
            $evendao = new EvenementDAO();
            $items = $evendao->findAll();
            $titre = "évènements";
            include_once 'Vue/v_adminliste.php';
            break;
        }
        case 'deleteEvenement': {
            $evendao = new EvenementDAO();
            $id = $_GET['id'];
            $even = $evendao->find($id);
            $evendao->delete($even);
            $items = $evendao->findAll();
            $titre = "évènements";
            include_once 'Vue/v_adminliste.php';
            break;
        }
    case 'demandeNouveleven': {
           $demande = 0;
           include("Vue/v_admin_newevenement.php");
           break;
        }
    
    case 'valideNouveleven': {
        $eventdao = new EvenementDAO;
        if (isset($_POST['evenement']) && isset($_POST['titre']) && is_uploaded_file($_FILES['image']['tmp_name'])) {
                $even = $_POST['evenement'];
                $titreeven = $_POST['titre'];
                if (is_uploaded_file($_FILES['image']['tmp_name'])) {
                    define('TARGET', 'Vue/img/evenement/');
                    fileupload();
                    $message = MESSAGE;
                    $nomImage = NOM_IMAGE;
                }
                $message="";
                //if ($message == 'Upload réussi !') {
                    $newevent = new evenement(-1, $even, $nomImage, $titreeven, new \DateTime());
                    $eventdao->create($newevent);
                    $resultat = "Votre evenement a bien été ajouté !";
                    $items = $eventdao->findAll();
                    $titre = "évènements";
                    include_once 'Vue/v_adminliste.php';
                //}
        }else {
                $messagedao = new MessageDAO();
                $signalements = $messagedao->getMessagesSignalement($_SESSION['id']);
                $renseignements = $messagedao->getRenseignements($_SESSION['id']);
                $demandesajout = $jeudao->getJeuxInvalides();
                $resultat = "Ajout impossible ! il manque des informations !";
                include_once 'Vue/v_admin.php';
            }
            break;
    } 
    
    case 'valideAjout': {
            $jeudao = new JeuDAO();
            $id = $_GET['id'];
            $jeu = $jeudao->find($id);
            $jeudao->valideAjout($jeu);
            $messagedao = new MessageDAO();
            $signalements = $messagedao->getMessagesSignalement($_SESSION['id']);
            $renseignements = $messagedao->getRenseignements($_SESSION['id']);
            $demandesajout = $jeudao->getJeuxInvalides();
            include_once 'Vue/v_admin.php';
            break;
        }
}
    
    function fileupload() {
                                   // Repertoire cible
                    define('MAX_SIZE', 300000);    // Taille max en octets du fichier
                    define('WIDTH_MAX', 3000);    // Largeur max de l'image en pixels
                    define('HEIGHT_MAX', 3000);    // Hauteur max de l'image en pixels
// Tableaux de donnees
                    $tabExt = array('jpg', 'gif', 'png', 'jpeg');    // Extensions autorisees
                    $infosImg = array();

// Variables
                    $extension = '';
                    $message = '';
                    $nomImage = '';


                    // On verifie si le champ est rempli
                    if (!empty($_FILES['image']['name'])) {
                        // Recuperation de l'extension du fichier
                        $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

                        // On verifie l'extension du fichier
                        if (in_array(strtolower($extension), $tabExt)) {
                            // On recupere les dimensions du fichier
                            $infosImg = getimagesize($_FILES['image']['tmp_name']);

                            // On verifie le type de l'image
                            if ($infosImg[2] >= 1 && $infosImg[2] <= 14) {
                                // On verifie les dimensions et taille de l'image
                                if (($infosImg[0] <= WIDTH_MAX) && ($infosImg[1] <= HEIGHT_MAX) && (filesize($_FILES['image']['tmp_name']) <= MAX_SIZE)) {
                                    // Parcours du tableau d'erreurs
                                    if (isset($_FILES['image']['error']) && UPLOAD_ERR_OK === $_FILES['image']['error']) {
                                        // On renomme le fichier
                                        $nomImage = md5(uniqid()) . '.' . $extension;

                                        // Si c'est OK, on teste l'upload
                                        if (move_uploaded_file($_FILES['image']['tmp_name'], TARGET . $nomImage)) {
                                            $message = 'Upload réussi !';
                                        } else {
                                            // Sinon on affiche une erreur systeme
                                            $message = 'Problème lors de l\'upload !';
                                        }
                                    } else {
                                        $message = 'Une erreur interne a empêché l\'uplaod de l\'image';
                                    }
                                } else {
                                    // Sinon erreur sur les dimensions et taille de l'image
                                    $message = 'Erreur dans les dimensions de l\'image !';
                                }
                            } else {
                                // Sinon erreur sur le type de l'image
                                $message = 'Le fichier à uploader n\'est pas une image !';
                            }
                        } else {
                            // Sinon on affiche une erreur pour l'extension
                            $message = 'L\'extension du fichier est incorrecte !';
                        }
                    } else {
                        // Sinon on affiche une erreur pour le champ vide
                        $message = 'Veuillez remplir le formulaire svp !';
                    }
                    define('NOM_IMAGE', $nomImage);
                    define('MESSAGE', $message);
            
     }

        
        
// getMesssages( ... , type='signalement');

