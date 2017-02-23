<?php 
//$estConnecte = estConnecte();
?>
<?php
/*$estConnecte = estConnecte();*/
if(!isset($_REQUEST['uc'])){
     $_REQUEST['uc'] = 'accueil';
}	 
$uc = $_REQUEST['uc'];
switch($uc){
	case 'accueil':{
                include('Vue/v_header.php');
		include("Vue/v_main.php");
                include('Vue/v_footer.php');
                break;
	}
	case 'connexion' :{
		include("Controleur/c_connexion.php");break;
	}
	case 'inscription' :{
		include("Controleur/c_inscription.php");break; 
	}
        case 'dashboard' :{
                include("Controleur/c_dashboard.php");break;
        }
}
?>