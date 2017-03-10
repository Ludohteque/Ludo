<?php

if(!isset($_GET['action'])){
	$_GET['action'] = 'demandeConnexion';
}
$action = $_GET['action'];

require_once("DAO/UserDAO.php");
switch($action){
	case 'demandeConnexion':{
		include("Vue/v_connexion.php");
		break;
	}
	case 'valideConnexion':{
                
		$login = $_POST['login'];
		$mdp = $_POST['mdp'];
                $mdp = md5($mdp);
                $userDAO=new UserDAO();
		$joueur = $userDAO->getInfosJoueur($login, $mdp);
                
                if($joueur!=null){
                    $_SESSION['pseudo']=$joueur->getPseudo();
                    $_SESSION['admin']=$joueur->isAdmin();
                    $_SESSION['bureau']=$joueur->isBureau();
                    if($joueur->isAdmin()){
                        include 'Vue/v_admin.php';
                    }else{ 
                        include("Vue/v_main.php"); }
                    include("Vue/v_main.php");
                } else{
                    include_once 'Vue/v_connexion.php';
                }
		break;}
        case 'deconnexion':{
            $userDAO=new UserDAO();
            $userDAO->deconnect();
            include("Vue/v_main.php");
            break;
        
        }
	default :{
		include("Vue/v_connexion.php");
		break;
	}
}?>
