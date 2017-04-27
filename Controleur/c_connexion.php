<?php

if (!isset($_GET['action'])) {
    $_GET['action'] = 'demandeConnexion';
}
$action = $_GET['action'];

switch ($action) {
    case 'demandeConnexion': {
            $joueur = 1;
            include("Vue/v_connexion.php");
            break;
        }
    case 'valideConnexion': {

            $login = $_POST['login'];
            $mdp = $_POST['mdp'];
            $mdp = md5($mdp);
            $userDAO = new UserDAO();
            $joueur = $userDAO->getInfosJoueur($login, $mdp);


            if ($joueur != null) {
                $_SESSION['pseudo'] = $joueur->getPseudo();
                $_SESSION['admin'] = $joueur->isAdmin();
                $_SESSION['bureau'] = $joueur->isBureau();
                $_SESSION['id'] = $joueur->getIdUser();
                if ($joueur->isAdmin()) {
                    include 'Vue/v_admin_evenements.php'; //à retirer pour y placer la vue du dashboard de l'admin.
                } else {
                    $jeuDAO = new JeuDAO();
                    $empruntDAO = new EmpruntDAO();
                    $lesNouveautes = $jeuDAO->getNouveautes();
                    $lesPopulaires = $jeuDAO->getPopulaires();
                    $lesEmpruntes = $empruntDAO->getDerniersEmprunts();
                    include("Vue/v_main.php");
                }
            } else {
                include_once 'Vue/v_connexion.php';
            }
            break;
        }
    case 'deconnexion': {
            $userDAO = new UserDAO();
            $userDAO->deconnect();
            $jeuDAO = new JeuDAO();
            $empruntDAO = new EmpruntDAO();
            $lesNouveautes = $jeuDAO->getNouveautes();
            $lesPopulaires = $jeuDAO->getPopulaires();
            $lesEmpruntes = $empruntDAO->getDerniersEmprunts();
            include("Vue/v_main.php");
            break;
        }
    default : {
            include("Vue/v_connexion.php");
            break;
        }
}
?>
