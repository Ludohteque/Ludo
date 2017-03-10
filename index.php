<?php
session_start();
require_once('DAO/Connexion.php');
require_once ('DAO/DAO.php');
/*$estConnecte = estConnecte();*/
if(!isset($_GET['uc'])){
     $_GET['uc'] = 'accueil';
}	 
$uc = $_GET['uc'];
switch($uc){
	case 'accueil':{
                
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
        case 'dashboardAdmin' : {
                include("Controleur/c_dashBoardAdmin.php");break;
        } 
}
?>
