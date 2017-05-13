<?php
require_once ('DAO/UserDAO.php');
require_once ('DAO/JeuDAO.php');

if(!isset($_GET['action'])){
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
            if(is_uploaded_file($_FILES['image']['tmp_name'])){
                $fichier = $_FILES['image']['name'];
                $jeudao = new JeuDAO();
                $jeudao->fileupload();
                $image = preg_replace("` `i", "", $fichier);
            }
            $isvalide = false;
            $nouveaujeu = new jeu(-1, $nom, $descriptif, $etat, 3, new \DateTime(), $image, $nbjoueurs, $tranchedage, $duree, $categories);
            $jeudao->create($nouveaujeu);
            $resultat = "Votre jeu a bien été ajouté !"; //TODO
            $messagedao = new MessageDAO();
            $signalements = $messagedao->getMessagesSignalement();
            $demandesajout = $jeudao->getJeuxInvalides();
                include_once 'Vue/v_admin.php';
            
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
}

// getMesssages( ... , type='signalement');

    

