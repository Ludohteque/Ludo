<?php
if(!isset($_REQUEST['action'])){
	$_REQUEST['action'] = 'demandeConnexion';
}
$action = $_REQUEST['action'];
switch($action){
	case 'demandeConnexion':{
		include("Vue/v_connexion.php");
		break;
	}
	case 'valideConnexion':{
		$login = $_REQUEST['login'];
		$mdp = $_REQUEST['mdp'];
                $mdp = md5($mdp);
		$visiteur = $pdo->getInfosVisiteur($login, $mdp);
                $admin = $pdo->getInfosAdmin($login, $mdp);
		if(!is_array( $visiteur) && !is_array($admin)){
			ajouterErreur("Login ou mot de passe incorrect");
			include("Vue/v_erreurs.php");
			include("Vue/v_connexion.php");
		} else if (is_array($visiteur)) {
			$id = $visiteur['id'];
			$nom =  $visiteur['nom'];
			$prenom = $visiteur['prenom'];
			connecter($id,$nom,$prenom);
			include("Vue/v_sommaireVisiteur.php");
		} else {
                        $id = $admin['id'];
			$nom =  $admin['nom'];
			$prenom = $admin['prenom'];
			connecter($id,$nom,$prenom);
			include("Vue/v_sommaireAdmin.php");
                }
		break;
	}
	default :{
		include("Vue/v_connexion.php");
		break;
	}
}
?>
