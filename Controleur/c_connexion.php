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
                $mdp = md5($mdp);
                $userDAO=new UserDAO();
		$joueur = $userDAO->getInfosJoueur($login, $mdp);
                //var_dump($joueur);
                if($joueur!=null){
                    $_SESSION['pseudo']=$joueur->getPseudo();
                    $_SESSION['admin']=$joueur->isAdmin();
                    $_SESSION['bureau']=$joueur->isBureau();
                    echo"hello";
                    include("Vue/v_main.php");
                } else{
                    include_once 'Vue/v_connexion.php';
                }
                
//              $admin = $pdo->getInfosAdmin($login, $mdp);
//                
//		if(!is_array( $joueur) && !is_array($admin)){
//			ajouterErreur("Login ou mot de passe incorrect");
//			include("Vue/v_erreurs.php");
//			include("Vue/v_connexion.php");
//		} else if (is_array($donneesForm)) {
//			$id = $joueur['id'];
//			$nom =  $joueur['nom'];
//			$prenom = $joueur['prenom'];
//			connecter($id,$nom,$prenom);
//			include("Vue/v_mainjoueur.php");
//		} else {
//                        $id = $admin['id'];
//			$nom =  $admin['nom'];
//			$prenom = $admin['prenom'];
//			connecter($id,$nom,$prenom);
//			include("Vue/v_admin.php");
//                }
		break;
	}
	default :{
		include("Vue/v_connexion.php");
		break;
	}
}?>
