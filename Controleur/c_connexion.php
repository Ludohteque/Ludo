<?php

 ?>

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
		$visiteur = $pdo->getInfosJoueur($login, $mdp);
                $comptable = $pdo->getInfosAdmin($login, $mdp);
		if(!is_array( $joueur) && !is_array($admin)){
			ajouterErreur("Login ou mot de passe incorrect");
			include("Vue/v_erreurs.php");
			include("Vue/v_connexion.php");
		} else if (is_array($joueur)) {
			$id = $joueur['id'];
			$nom =  $joueur['nom'];
			$prenom = $joueur['prenom'];
			connecter($id,$nom,$prenom);
			include("Vue/v_mainjoueur.php");
		} else {
                        $id = $admin['id'];
			$nom =  $admin['nom'];
			$prenom = $admin['prenom'];
			connecter($id,$nom,$prenom);
			include("Vue/v_admin.php");
                }
		break;
	}
	default :{
		include("Vue/v_connexion.php");
		break;
	}
}?>
