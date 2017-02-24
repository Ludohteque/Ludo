<?php
include('DAO/JeuDAO.php');
$jeuDAO = new JeuDAO();
$jeuDAO->getDerniersJeux();
foreach ($jeuDAO as $value){
    
}
