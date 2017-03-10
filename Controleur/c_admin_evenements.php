<?php

//if(!isset($_POST['action'])){
//	$_POST['action'] = 'evenement';
//}

$action = $_POST['action'];
switch ($action) {
    case "ajouterEvenement":
        $id = $_POST['id'];
        $daoeven = new EvenementDAO();
        $even = $daoeven->find($id);
        include_once 'Vue/v_admin_evenement.php';
        break;
}