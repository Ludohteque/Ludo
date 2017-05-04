<?php
require_once ('DAO/UserDAO.php');

if(!isset($_GET['action'])){
	$_GET['action'] = 'admin';
}

$action = $_GET['action'];
switch ($action) {
    case "demandeAdmin":
        $messagedao = new MessageDAO();
        $jeudao = new JeuDAO();
        $signalements = $messagedao->getMessagesSignalement();
        $demandesajout = $jeudao->getJeuxInvalides();
        include_once 'Vue/v_admin.php';
        break;
}

// getMesssages( ... , type='signalement');

    

