<?php

if(!isset($_GET['action'])){
	$_GET['action'] = 'demandeConnexion';
}
$action = $_GET['action'];


switch($action){
	case 'demandeConnexion':{
		include("Vue/v_connexion.php");
		break;
	}
	case 'valideConnexion':{
                require_once("DAO/UserDAO.php");
		$login = $_POST['login'];
		$mdp = $_POST['mdp'];
                //$mdp = md5($mdp);
                $userDAO=new UserDAO();
		$joueur = $userDAO->getInfosJoueur($login, $mdp);
                
                if($joueur!=null){
                    $_SESSION['pseudo']=$joueur->getPseudo();
                    $_SESSION['admin']=$joueur->isAdmin();
                    $_SESSION['bureau']=$joueur->isBureau();
                    
                    include("Vue/v_main.php");
                } else{
                    include_once 'Vue/v_connexion.php';
                }
		break;}
        case 'deconnection':{
            $_SESSION=array();
            session_destroy();
            break;
        
        }
	default :{
		include("Vue/v_connexion.php");
		break;
	}
}?>
