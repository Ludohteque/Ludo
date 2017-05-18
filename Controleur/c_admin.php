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
        $signalements = $messagedao->getMessagesSignalement();
        $demandesajout = $jeudao->getJeuxInvalides();
        include_once 'Vue/v_admin.php';
        break;
    case 'demandeNouveaujeu': {
            $demande = 0;
            include("Vue/v_nouveaujeu.php");
            break;
        }
    case 'valideNouveaujeu': {
            if (isset($_POST['nom']) && isset($_POST['descriptif']) && isset($_POST['etat']) && isset($_POST['age']) && isset($_POST['categories']) && isset($_POST['nbjoueurs']) && isset($_POST['duree'])) {
                $nom = $_POST['nom'];
                $descriptif = $_POST['descriptif'];
                $etat = $_POST['etat'];
                $tranchedage = $_POST['age'];
                $categories = $_POST['categories'];
                $nbjoueurs = $_POST['nbjoueurs'];
                $duree = $_POST['duree'];
                $jeudao = new JeuDAO();
                if (is_uploaded_file($_FILES['image']['tmp_name'])) {
                    $fichier = $_FILES['image']['name'];
                    $jeudao->fileupload();
                    $image = preg_replace("` `i", "", $fichier);
                }
                
                // attention le formulaire d'image oblige à rafraichir le formulaire de nouveau jeu en boucle
                $isvalide = 0;
                $nouveaujeu = new jeu(-1, $nom, $descriptif, $etat, 3, new \DateTime(), $image, $nbjoueurs, $tranchedage, $duree, $categories);
                $jeudao->create($nouveaujeu);
                $resultat = "Votre jeu a bien été ajouté !"; //TODO
                $items = $jeudao->getAll();
                $titre = "jeux";
                include_once 'Vue/v_adminliste.php';
            } else {
                $messagedao = new MessageDAO();
                $jeudao = new JeuDAO();
                $signalements = $messagedao->getMessagesSignalement();
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

    case 'jeuxAdmin': {
            $jeudao = new JeuDAO();
            $items = $jeudao->getAll();
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
}

// getMesssages( ... , type='signalement');

    

