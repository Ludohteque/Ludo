<?php
if(!isset($_GET['action'])){
	$_GET['action'] = 'demandeInscription';
}
$action = $_GET['action'];
switch($action){
	case 'demandeInscription':{
		include("Vue/v_inscription.php");
		break;
	}
	case 'valideInscription':{
		$login = $_POST['pseudo'];
		$mdp = $_POST['passe'];
                $mdp = md5($mdp);
                $ville= $_POST['ville'];
                $mail = $_POST['mail'];
                $phone = $_POST['phone'];
                $userdao = new UserDAO();
		if($userdao->pseudoExist($login)){
                    ajouterErreur("Ce pseudo existe déjà.");
                    include("Vue/v_erreurs.php");
                    include("Vue/v_connexion.php");
		} elseif ($userdao->mailExist($mail)) {
                    ajouterErreur("Ce mail existe déjà.");
                    include("Vue/v_erreurs.php");
                    include("Vue/v_connexion.php");
                }else {
                    $user = new User(-1, $login, $ville, $mail, $phone, false, false, $mdp, 0, 0, false, 0);
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
