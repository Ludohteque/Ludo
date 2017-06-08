<?php include('v_header.php'); ?>
<h5>Administration des <?php echo $titre; ?> :</h5></br></br>
<table class="tableau width90">
    <tr class="tableauTete">
        <?php if ($titre == "emprunte") {
            ?>
            <th style="text-align:center;">Jeu(x)</th>
            <th style="text-align:center;">Date emprunt</th>
            <th style="text-align:center;">Note</th>
            <th style="text-align:center;">Photo</th>

        <?php } else {
            ?>
            <th style="text-align:center;">Jeu(x)</th>
            <th style="text-align:center;">Note</th>
            <th style="text-align:center;">Photo</th>

        <?php } ?>
    </tr>
    <?php foreach ($items as $item) { ?>
        <tr class="small">
            <?php if ($titre == "emprunte") { ?>
                <td> <?php echo $item->getIdExemplaire()->getIdJeu()->getnomJeu(); ?></td>
                <td> <?php echo $item->getDateEmprunts(); ?></td>
                <td> <?php echo $item->getIdExemplaire()->getIdJeu()->getNote(); ?></td>
                <td><img width="150" height="100" src="Vue/img/jeu/<?php echo $item->getIdExemplaire()->getIdJeu()->getImage(); ?>"/></td>


    <?php } else { ?>
                <td> <?php echo $item->getnomJeu(); ?></td>
                <td> <?php echo $item->getNote(); ?></td>
                <td><img width="150" height="100" src="Vue/img/jeu/<?php echo $item->getImage(); ?>"/></td>
        <?php
    }
}
?>

<?php include('Vue/v_footer.php'); ?>


