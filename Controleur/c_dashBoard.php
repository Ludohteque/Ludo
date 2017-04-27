<?php

if (!isset($_GET['action'])) {
    $_GET['action'] = 'demandeDashboard';
}
$action = $_GET['action'];
switch ($action) {
    case 'demandeDashboard':
        include('Vue/v_dashboard.php');
    case 'repondre':
        $destinataire = $_GET['id'];
        $userdao = new UserDAO();
        $user = $userdao->find($destinataire);
        include('Vue/v_dashboard_message.php');
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

