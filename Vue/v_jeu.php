<?php
include('Vue/v_header.php');

?>

<div class='container description'>
    <div class='row'>
        <div class='col-md-8'>
            <h1><?php echo $jeu->getNom();?></h1>
            <p><?php echo $jeu->getDescriptif();?></p>
        </div>
        <div class='col-md-4'>
            <img class='imgJeu' src='<?php echo LIEN_IMAGE.$jeu->getImage();?>'/>
        </div>
    </div>
    <div class="row">
        <div class='col-md-6'><h3>Catégorie</h3></div>
        <div class='col-md-6'><h3>Note</h3><p><?php echo $jeu->getNote();?></p></div>
    </div>
</div>

