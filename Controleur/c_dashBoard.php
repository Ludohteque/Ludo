<?php

if (!isset($_GET['action'])) {
    $_GET['action'] = 'demandeDashboard';
}
$action = $_GET['action'];
switch ($action) {
    case 'demandeDashboard': // affiche la dashboard
        include('Vue/v_dashboard.php');
        break;
    case 'repondreMessage': // Appelle le formulaire permettant de répondre à un message
        $user = null;
        if (isset($_GET['id'])) {
            $destinataire = $_GET['id'];
            $userdao = new UserDAO();
            $user = $userdao->find($destinataire);
        }

        include('Vue/v_dashboard_message.php');
        break;

    case 'reponseAdmin': // Permet à l'admin de répondre à un message de signalment ou de renseignement.
        $destinataire = null;
        if (isset($_GET['id'])) {
            $message = $_GET['id'];
        }
        $messagedao = new MessageDAO();
        $message = $messagedao->find($message);
        $destinataire = $message->getIdExpediteur();
        $userdao = new UserDAO();
        $user = $userdao->find($destinataire);
        $type = $message->getType();
        include('Vue/v_dashboard_message.php');
        break;

    case 'envoyerMessage': //permet d'envoyer un message
        $expediteur = $_POST['expediteur'];
        $sujet = $_POST['sujet'];
        $destinataire = $_POST['destinataire'];
        $userdao = new UserDAO();
        $userExpediteur = $userdao->findParPseudo($expediteur);
        $userDestinataire = $userdao->findParPseudo($destinataire);
        if ($userDestinataire == null) {
            $resultat = "Le destinataire n'existe pas.";
        } else {
            $corps = $_POST['corps'];
            $type = $_POST['type'];
            $message = new Message(-1, $corps, $userExpediteur, $userDestinataire, $sujet, $type, date('Y-m-d H:i:s'));
            $messagedao = new MessageDAO();
            $messagedao->create($message);
            $resultat = "Votre message a bien été envoyé.";
        }
        include('Vue/v_dashboard.php');
        break;
    case 'ajouterExemplaire': // appelle formulaire d'nregistrment d'exemplaire
        $daojeu = new JeuDAO();
        $jeux = $daojeu->getAll();
        include('Vue/v_dashboard_ajout_exemplaire.php');
        break;
    case 'enregistrerExemplaire': //Signifie à l'application que je possède un jeu générique
        $nom = $_POST['jeu'];
        $etat = $_POST['etat'];
        $dispo = $_POST['dispo'];
        $daojeu = new JeuDAO();
        $jeu = $daojeu->findParNom($nom);
        $daouser = new UserDAO();
        $user = $daouser->find($_SESSION['id']);
        $exemplaire = new Exemplaire(-1, $jeu, $user, $etat, $dispo);
        $daoexemplaire = new ExemplaireDAO();
        $daoexemplaire->create($exemplaire);
        include('Vue/v_dashboard.php');
        break;

    case 'supprExemplaire':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $exemplairedao = new ExemplaireDAO();
            $exemplaire = $exemplairedao->find($id);
            $exemplairedao->delete($exemplaire);
        }
        include_once 'Vue/v_dashboard.php';
        break;

    case 'modifExemplaire':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $exemplairedao = new ExemplaireDAO();
            $exemplaire = $exemplairedao->find($id);
        }
        include_once('Vue/v_dashboard_modif_exemplaire.php');
        break;

    case 'valideModifExemplaire':
        if (isset($_POST['id'])) {
            $exemplairedao = new ExemplaireDAO();
            $id = $_POST['id'];
            $etat = $_POST['etat'];
            $dispo = $_POST['dispo'];
            $exemplaire = $exemplairedao->find($id);
            $exemplaire->setEtat($etat);
            $exemplaire->setDisponibilite($dispo);
            $exemplairedao->update($exemplaire);
        }
        include_once 'Vue/v_dashboard.php';
        break;

    case 'choixPreteur':
        $destinataire = null;
        if (isset($_GET['id'])) {
            $destinataire = $_GET['id'];
        }
        $userdao = new UserDAO();
        $utils = $userdao->findAll();
        include('Vue/v_listeutilisateurs.php');
        break;
    case 'demarrerEmprunt': //affiche la vue emprunt selon le propriétaire
        $preteur = null;
        if (isset($_POST['preteur'])) {
            $preteur = $_POST['preteur'];
        }
        $userdao = new UserDAO();
        $user = $userdao->find($preteur);
        include('Vue/v_dashboard_emprunt.php');
        break;
    case 'ajoutPret': // démarre un emprunt
        $daouser = new UserDAO();
        $emprunteur = $daouser->find($_SESSION['id']);
        $daoexemplaire = new ExemplaireDAO();
        $exemplaire = $daoexemplaire->find($_POST['exemplaire']);
        $emprunt = new Emprunt(-1, null, null, $emprunteur, $exemplaire, "En attente de validation", $_POST['date']);
        $daoemprunt = new EmpruntDAO();
        $daoemprunt->create($emprunt);
        $resultat = "La demande d'emprunt a bien été envoyé au prêteur.";
        include('Vue/v_dashboard.php');
        break;
    case 'validerEmprunt': //emprunt valide
        $daoemprunt = new EmpruntDAO();
        $emprunt = $daoemprunt->find($_GET['id']);
        $emprunt->setStatut("En cours");
        $emprunt->setDateEmprunts(date('Y-m-d'));
        $daoemprunt->update($emprunt);
        $daoexemplaire = new ExemplaireDAO();
        $exemplaire = $emprunt->getIdExemplaire();
        $exemplaire->setDisponibilite(0);
        $daoexemplaire->update($exemplaire);
        $resultat = "L'emprunt a été enregistré en tant qu'emprunt en cours.";
        include('Vue/v_dashboard.php');
        break;
    case 'remiseJeu': //signifie que le jeu emprunté a été rendu
        $id = $_GET['id'];
        $daoemprunt = new EmpruntDAO();
        $emprunt = $daoemprunt->find($id);
        $emprunt->setDateRemise(date('Y-m-d H:i:s'));
        $emprunt->setStatut("Fini");
        $daoemprunt->update($emprunt);
        $daoexemplaire = new ExemplaireDAO();
        $exemplaire = $emprunt->getIdExemplaire();
        $exemplaire->setDisponibilite(1);
        $daoexemplaire->update($exemplaire);
        $resultat = "Le jeu a bien été enregistré comme rendu.";
        include('Vue/v_dashboard.php');
        break;
    case 'annulerEmprunt': //annule l'emprunt => statut
        $id = $_GET['id'];
        $daoemprunt = new EmpruntDAO();
        $emprunt = $daoemprunt->find($id);
        $emprunt->setStatut("Annulé");
        $daoemprunt->update($emprunt);
        $resultat = "L'emprunt proposé a été refusé.";
        include('Vue/v_dashboard.php');
        break;
    case 'changementDate': //apelle la vue pour changer la date de rendu d'un jeu
        $id = $_GET['id'];
        include('Vue/v_changementdate.php');
        break;
    case 'validerDate': //voir précédent
        $id = $_POST['id'];
        $daoemprunt = new EmpruntDAO();
        $emprunt = $daoemprunt->find($id);
        $emprunt->setDateLimite($_POST['date']);
        $daoemprunt->update($emprunt);
        $resultat = "La date a été modifié.";
        include('Vue/v_dashboard.php');
        break;
    case 'contactAdmin': //affiche le formulaire permettant de contacter l'admin
        $userdao = new UserDAO();
        $user = $userdao->find($_GET['id']);
        include('Vue/v_dashboard_messageadmin.php');
        break;
    case 'confirmContactAdmin': //contactye l'admin : voir précédent
        $corps = $_POST['corps'];
        $sujet = $_POST['sujet'];
        $type = $_POST['type'];
        $userdao = new UserDAO();
        $expediteur = $userdao->find($_GET['id']);
        $destinataires = $userdao->getAdmins();
        $messagedao = new MessageDAO();
        foreach ($destinataires as $admin) {
            $message = new Message(-1, $corps, $expediteur, $admin, $sujet, $type, date('Y-m-d H:i:s'));

            $messagedao->create($message);
        }
        include('Vue/v_dashboard.php');
        break;

    case 'modifierInfos': //affiche le formulaire permettant de modifier son profil
        $id = $_SESSION['id'];
        $userdao = new UserDAO();
        $user = $userdao->find($id);
        include ('Vue/v_dashboard_profil.php');
        break;
    case 'modifProfil': //modifie le profil => voir précédent
        $pseudo = $_POST['Pseudo'];
        $ville = $_POST['Ville'];
        $mail = $_POST['Email'];
        $telephone = $_POST['Telephone'];
        $mdp1 = $_POST['mdp1'];
        $mdp2 = $_POST['mdp2'];
        $id = $_SESSION['id'];
        $userdao = new UserDAO();
        $user = $userdao->find($id);
        If ($pseudo != "") {
            $user->setPseudo($pseudo);
        }
        if ($ville != "") {
            $user->setVille($ville);
        }
        if ($mail != "") {
            $user->setMail($mail);
        }
        if ($telephone != "") {
            $user->setTel($telephone);
        }
        if ($mdp1 != "") {
            $user->setMdp(md5($mdp1));
        }
        $userdao->update($user);

        include('Vue/v_dashboard.php');
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

