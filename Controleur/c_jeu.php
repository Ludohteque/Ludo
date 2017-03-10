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
        $daocat->setCategoriesParJeu($jeu);
        $listeExemplaires = $daoexemplaire->findListeExemplaire($jeu->getIdProduit());
        include_once 'Vue/v_jeu.php';
        break;
}
