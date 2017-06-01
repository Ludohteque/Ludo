<?php

session_start();
define('LIEN_IMAGE', 'Vue/img/');

require_once('DAO/Connexion.php');
require_once('DAO/DAO.php');
require_once('DAO/UserDAO.php');
require_once('DAO/ExemplaireDAO.php');
require_once('DAO/EmpruntDAO.php');
require_once('DAO/JeuDAO.php');
require_once('DAO/CategorieDAO.php');
require_once('DAO/CommentaireDAO.php');
require_once('DAO/DureeDAO.php');
require_once('DAO/EvenementDAO.php');
require_once('DAO/MessageDAO.php');
require_once('DAO/ProduitDAO.php');
require_once('DAO/TrancheAgeDAO.php');
require_once('DAO/NombreJoueursDAO.php');

if (!isset($_GET['uc'])) {
    $_GET['uc'] = 'accueil';
}
$uc = $_GET['uc'];
switch ($uc) {
    case 'accueil': {
            $jeuDAO = new JeuDAO();
            $empruntDAO = new EmpruntDAO();
            $lesNouveautes = $jeuDAO->getNouveautes();
            $lesPopulaires = $jeuDAO->getPopulaires();
            $lesEmpruntes = $empruntDAO->getDerniersEmprunts();
            include("Vue/v_main.php");
            break;
        }
    case 'connexion' : {
            include("Controleur/c_connexion.php");
            break;
        }
    case 'admin' : {
            include("Controleur/c_admin.php");
            break;
        }
    case 'inscription' : {
            include("Controleur/c_inscription.php");
            break;
        }
    case 'dashboard' : {
            include("Controleur/c_dashboard.php");
            break;
        }
    case 'jeu' : {
            include("Controleur/c_jeu.php");
            break;
        }
    case 'evenement' : {
            include("Controleur/c_admin_evenements.php");
            break;
        }
}
?>
