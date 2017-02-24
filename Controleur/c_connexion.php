<?php

 ?>

<?php
if(!isset($_POST['action'])){
	$_POST['action'] = 'demandeConnexion';
}
$action = $_POST['action'];
switch($action){
	case 'demandeConnexion':{
		include("Vue/v_connexion.php");
		break;
	}
	case 'valideConnexion':{
		$login = $_POST['login'];
		$mdp = $_POST['mdp'];
                $mdp = md5($mdp);
		$joueur = $pdo->getInfosJoueur($login, $mdp);
                $admin = $pdo->getInfosAdmin($login, $mdp);
		if(!is_array( $joueur) && !is_array($admin)){
			ajouterErreur("Login ou mot de passe incorrect");
			include("Vue/v_erreurs.php");
			include("Vue/v_connexion.php");
		} else if (is_array($donneesForm)) {
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
