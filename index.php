<?php
session_start();
/*$estConnecte = estConnecte();*/
require_once('DAO/Connexion.php');
require_once('DAO/DAO.php');
if(!isset($_REQUEST['uc'])){
     $_REQUEST['uc'] = 'accueil';
}	 
$uc = $_REQUEST['uc'];
switch($uc){
	case 'accueil':{
                include('DAO/JeuDAO.php');
                $jeuDAO = new JeuDAO();
                
                $lesDerniersJeux = $jeuDAO->getDerniersJeux();
		include("Vue/v_main.php");
             
                break;
	}
	case 'connexion' :{
		include("Controleur/c_connexion.php");break;
	}
	case 'inscription' :{
		include("Controleur/c_inscription.php");break; 
	}
        case 'dashboard' :{
                include("Controleur/c_dashboard.php");break;
        }
}
?>
