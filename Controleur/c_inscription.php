<?php
if(!isset($_REQUEST['action'])){
	$_REQUEST['action'] = 'demandeInscription';
}
$action = $_REQUEST['action'];
switch($action){
	case 'demandeInscription':{
		include("Vue/v_inscription.php");
		break;
	}
	case 'valideInscription':{
		$login = $_POST['pseudo'];
		$mdp = $_REQUEST['passe'];
                $mdp = md5($mdp);
                $ville= $_REQUEST('ville');
                $mail = $_REQUEST('mail');
                $phone = $_REQUEST('phone');
		if(is_array( $joueur) && is_array($admin)){
			ajouterErreur("Joueur déjà éxistant !!!");
			include("Vue/v_erreurs.php");
			include("Vue/v_connexion.php");
		} else {
                    include('DAO/UserDAO.php');
                    $userdao = new UserDAO();
                    
                }
		break;
	}
	default :{
		include("Vue/v_connexion.php");
		break;
	}
}?>
