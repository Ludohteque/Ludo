<?php
$action = $_GET['action'];
switch($action) {
    case "affichage":
        $id = $_GET['id'];
        $daojeu = new JeuDAO();
        $daocat = new CategorieDAO();
        $daoexemplaire = new ExemplaireDAO();
        $daouser = new UserDAO();
        $jeu = $daojeu->find($id);
        $listeExemplaires = $daoexemplaire->findListeExemplaire($jeu->getIdProduit());
        include_once 'Vue/v_jeu.php';
        break;
    case'voirPlus':
            $titre = $_GET['titre'];
            switch ($titre):
                case "emprunte":
                    $empruntDAO = new EmpruntDAO();
                    $items = $empruntDAO->getDerniersEmprunts(False);
                    break;
                case "nouveaute":
                    $jeuxDAO = new JeuDAO();
                    $items = $jeuxDAO->getNouveautes(False);
                    break;
                case "populaire":
                    $jeuxDAO = new JeuDAO();
                    $items = $jeuxDAO ->getPopulaires(False);
                    break;                
            endswitch;
            include('Vue/v_voir_plus.php');
}
