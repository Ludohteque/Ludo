<?php
require_once 'DAO/JeuDAO.php';
$action = $_GET['action'];
switch($action) {
    case "affichage":
        $id = $_GET['id'];
        $daojeu = new JeuDAO();
        $jeu = $daojeu->find($id);
        include_once 'Vue/v_jeu.php';
        break;
    
}
