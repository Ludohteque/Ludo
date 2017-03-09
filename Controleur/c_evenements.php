<?php
if(!isset($_GET['action'])){
	$_GET['action'] = 'demandeEvenement';
}

$action = $_GET['action'];
switch($action) {
case "affichageEven":
        $id = $_GET['id'];
        $daoeven = new EvenementDAO();
        $even = $daoeven->find($id);
        include_once 'Vue/v_evenement.php';
        break;
}