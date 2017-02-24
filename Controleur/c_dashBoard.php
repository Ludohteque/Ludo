<?php
require_once('DAO/UserDAO.php');
if(!isset($_GET['action'])){
	$_GET['action'] = 'demandeDashboard';
}
$action = $_GET['action'];

if(UserDAO::testConnexion()){
    include('Vue/v_dashboard.php');
}
else {
    include('Vue/v_connexion.php');
}
?>

