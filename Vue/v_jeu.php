<?php
include('Vue/v_header.php');
?>

<div class='container description'>
    <div class='row'>
        <div class='col-md-8'>
            <h1><?php echo $jeu->getNom(); ?></h1>
            <p><?php echo $jeu->getDescriptif(); ?></p>
        </div>
        <div class='col-md-4'>
            <img class='imgJeu' src='<?php echo LIEN_IMAGE . $jeu->getImage(); ?>'/>
        </div>
    </div>
    <div class="row">
        <div class='col-md-6'>
            <h3>Catégorie(s)</h3>
            <p><?php
                foreach ($jeu->getLesCategories() as $uneCategorie) {
                    echo $uneCategorie."<br>";
                }
                ?></p>
        </div>
        <div class='col-md-6'>
            <h3>Note</h3>
            <p><?php echo $jeu->getNote() . "/5"; ?></p>
        </div>
    </div>
</div>
<div class="container contacts">
    <h3>Ils ont ce jeu !</h3>
    <table class="tableau">
        <tr class="tableauTete">
            <th>Exemplaire</th>
            <th>Pseudo</th>
            <th>Localisation</th>
            <th>Disponible</th>
            <th>Note</th>
        </tr>
        <?php
        foreach ($listeExemplaires as $unExemplaire) {
            $disponible = $unExemplaire->getDisponibilite();
            ?>
            <tr>
                <td><?php echo $unExemplaire->getIdExemplaire(); ?></td>
                <td><?php echo $unExemplaire->getIdUser()->getPseudo(); ?></td>
                <td><?php echo $unExemplaire->getIdUser()->getVille(); ?></td>
                <td><?php if ($disponible) {
                echo "Oui";
            } else {
                echo "Non";
            } ?></td>
                <td><?php echo $unExemplaire->getIdUser()->getMoyenne(); ?></td>
            </tr>   
    <?php
}
?>
    </table>
</div>

