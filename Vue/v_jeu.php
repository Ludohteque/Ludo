<?php
include('Vue/v_header.php');

?>

<div class='container description'>
    <div class='row'>
        <div class='col-md-8'>
            <h1><?php echo $jeu->getNom();?></h1>
        </div>
        <div class='col-md-4'>
            <img class='imgJeu' src='<?php echo LIEN_IMAGE.$jeu->getImage();?>'/>
        </div>
    </div>
    
</div>

