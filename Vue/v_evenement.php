<?php
include('Vue/v_header.php');
?>

<div class='container description'>
    <div class='row'>
        <div class='col-md-8'>
            <h1><?php echo $even->getTitre(); ?></h1>
            
        </div>
        <div class='col-md-4'>
            <h4><?php setlocale(LC_ALL, "fra_FRA");
            echo "Créé le : ".strftime('%A %e %B %Y', strtotime($even->getDateAjout())); ?></h4>  <!-- date_format(date_create($even->getDateAjout()),'l j F Y')-->
        </div>
    </div>
    </br></br>
    <div class="row">
        <div class='col-md-1'></div>
    <div class='col-md-10'>
            <img class='imgeven' src='<?php echo $even->getLienImage(); ?>'/>
        </div>
    </div>
    <div class="row">
    <div class="evenement"></br></br>
        <p><?php echo $even->getEvenement(); ?></p>
    </div>
</div>


</div>

