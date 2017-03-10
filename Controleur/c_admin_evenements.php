<?php
require_once ('DAO/EvenementDAO.php');
if(!isset($_GET['action'])){
	$_GET['action'] = 'evenement';
}

$action = $_GET['action'];
switch ($action) {
    case "affichageEven":
        $id = $_GET['id'];
        $daoeven = new EvenementDAO();
        $even = $daoeven->find($id);
        include_once 'Vue/v_evenement.php';
        break;
    case "ajouterEvenement":
        $id = $_POST['id'];
        $daoeven = new EvenementDAO();
        $even = $daoeven->find($id);
        include_once 'Vue/v_admin_evenement.php';
        break;
}