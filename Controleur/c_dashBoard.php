<?php
require_once('DAO/UserDAO.php');
require_once('DAO/EmpruntDAO.php');
include('Vue/v_dashboard.php');
if(!isset($_GET['action'])){
	$_GET['action'] = 'demandeDashboard';
}
$action = $_GET['action'];
// a décommenter pour que cela demande la connexion, et avoir un truc fonctionnel... 
// Commenté a des fins de tests.
//if(UserDAO::testConnexion()){
//    include('Vue/v_dashboard.php');
//}
//else {
//    include('Vue/v_connexion.php');
//}
?>

