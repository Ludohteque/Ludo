<?php

if (!isset($_GET['action'])) {
    $_GET['action'] = 'demandeDashboard';
}
$action = $_GET['action'];
$messageEnvoye = false;
switch ($action) {
    case 'demandeDashboard':
        include('Vue/v_dashboard.php');
        break;
    case 'repondreMessage':
        $destinataire = null;
        if (isset($_GET['id'])) {
            $destinataire = $_GET['id'];
        }
        $userdao = new UserDAO();
        $user = $userdao->find($destinataire);
        include('Vue/v_dashboard_message.php');
        break;
    case 'envoyerMessage':
        $messageEnvoye = true;
        $expediteur = $_POST['expediteur'];
        $sujet = $_POST['sujet'];
        $destinataire = $_POST['destinataire'];
        $corps = $_POST['corps'];
        $type = $_POST['type'];
        $userdao = new UserDAO();
        $userExpediteur = $userdao->findParPseudo($expediteur);
        $userDestinataire = $userdao->findParPseudo($destinataire);
        if ($userDestinataire == null) {
            $resultat = "Le destinataire n'existe pas.";
        } else {
            $message = new Message(-1, $corps, $userExpediteur, $userDestinataire, $sujet, $type, date('Y-m-d H:i:s'));
            $messagedao = new MessageDAO();
            $messagedao->create($message);
            $resultat = "Votre message a bien été envoyé.";
        }
        include('Vue/v_dashboard.php');
        break;
    case 'ajouterExemplaire':
        $daojeu = new JeuDAO();
        $jeux = $daojeu->getAll();
        include('Vue/v_dashboard_ajout_exemplaire.php');
        break;
    case 'enregistrerExemplaire':
        $nom = $_POST['jeu'];
        $etat = $_POST['etat'];
        $dispo = $_POST['dispo'];
        if ($dispo == "on") {
            $dispo = 1;
        } else {
            $dispo = 0;
        }
        $daojeu = new JeuDAO();
        $jeu = $daojeu->findParNom($nom);
        $daouser = new UserDAO();
        $user = $daouser->find($_SESSION['id']);
        $exemplaire = new Exemplaire(-1, $jeu, $user, $etat, $dispo);
        $daoexemplaire = new ExemplaireDAO();
        $daoexemplaire->create($exemplaire);
        include('Vue/v_dashboard.php');
        break;
    case 'demarrerEmprunt':
        $destinataire = null;
        if (isset($_GET['id'])) {
            $destinataire = $_GET['id'];
        }
        $userdao = new UserDAO();
        $user = $userdao->find($destinataire);
        include('Vue/v_dashboard_emprunt.php');
        break;
}
// a décommenter pour que cela demande la connexion, et avoir un truc fonctionnel... 
// Commenté a des fins de tests.
//if(UserDAO::testConnexion()){
//   include('Vue/v_dashboard.php');
//}
//else {
//    include('Vue/v_connexion.php');
//}
?>

