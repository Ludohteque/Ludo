<?php
if(!isset($_POST['action'])){
	$_POST['action'] = 'demandeInscription';
}
$action = $_POST['action'];
switch($action){
	case 'demandeInscription':{
		include("Vue/v_inscription.php");
		break;
	}
	case 'valideInscription':{
                echo ("hello");
		$login = $_POST['pseudo'];
		$mdp = $_POST['passe'];
                $mdp = md5($mdp);
                $ville= $_POST('ville');
                $mail = $_POST('mail');
                $phone = $_POST('phone');
		if(is_array($joueur) && is_array($admin)){
			ajouterErreur("Joueur déjà éxistant !!!");
			include("Vue/v_erreurs.php");
			include("Vue/v_connexion.php");
		} else {
                    include('Modele/User.php');
                    $user = new User($pseudo, $ville, $mail, $tel, $mdp, 0);
                    include('DAO/UserDAO.php');
                    $userdao = new UserDAO();
                    $userdao->create($user);
                    include('Vue/v_main.php');
                }
		break;
	}
	default :{
		include("Vue/v_connexion.php");
		break;
	}
}?>
