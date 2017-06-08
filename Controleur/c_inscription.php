<?php

if (!isset($_GET['action'])) {
    $_GET['action'] = 'demandeInscription';
}
$action = $_GET['action'];
switch ($action) {
    case 'demandeInscription': {
            $demande = 0;
            include("Vue/v_inscription.php");
            break;
        }
    case 'valideInscription': {
            $demande = 1;
            $login = $_POST['pseudo'];
            $mdp = $_POST['passe'];
            $mdp = md5($mdp);
            $ville = $_POST['ville'];
            $mail = $_POST['mail'];
            $phone = $_POST['phone'];
            $userdao = new UserDAO();
            if ($userdao->pseudoExist($login) || $userdao->mailExist($mail)) {
                include("Vue/v_inscription.php");
            } else {
                $user = new User(-1, $login, $ville, $mail, $phone, false, false, $mdp, 0, 0, false, 0);
                $userdao->create($user);
                $jeuDAO = new JeuDAO();
                $empruntDAO = new EmpruntDAO();
                $userDAO = new UserDAO();
                $joueur = $userDAO->getInfosJoueur($login, $mdp);
                $_SESSION['pseudo'] = $joueur->getPseudo();
                $_SESSION['admin'] = $joueur->isAdmin();
                $_SESSION['bureau'] = $joueur->isBureau();
                $_SESSION['id'] = $joueur->getIdUser();
                $lesNouveautes = $jeuDAO->getNouveautes(True);
                $lesPopulaires = $jeuDAO->getPopulaires(True);
                $lesEmpruntes = $empruntDAO->getDerniersEmprunts(True);
                include('Vue/v_main.php');
            }
            break;
        }
    default : {
            include("Vue/v_connexion.php");
            break;
        }
}
?>
