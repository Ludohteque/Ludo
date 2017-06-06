<?php include('v_header.php'); ?>
<h5>Administration des <?php echo $titre; ?> :</h5></br></br>
<table class="tableau width90">
    <tr class="tableauTete">
        <?php if ($titre == "utilisateurs") { ?>
            <th style="text-align:center;">Id</th>
            <th style="text-align:center;">Pseudo</th>
            <th style="text-align:center;">Ville</th>
            <th style="text-align:center;">Téléphone</th>
            <th style="text-align:center;">Est admin</th>
            <th style="text-align:center;">Note moyenne</th>
            <th style="text-align:center;">Banni ?</th>
            <th colspan="2" style="text-align:center;">Actions</th>
        <?php } else if ($titre == "jeux") { ?>
            <th style="text-align:center;">Id</th>
            <th style="text-align:center;">Nom</th>
            <th style="text-align:center;">Descriptif</th>
            <th style="text-align:center;">Etat</th>
            <th style="text-align:center;">Categories</th>
            <th style="text-align:center;">Nombre de joueurs</th>
            <th style="text-align:center;">Durée</th>
            <th style="text-align:center;">Tranche d'âge</th>
            <th style="text-align:center;">Note</th>
            <th style="text-align:center;">Date d'ajout</th>
            <th style="text-align:center;">Image</th>
            <th style="text-align:center;">Actions</th>

        <?php } else if ($titre == "évènements") { ?>
            <th style="text-align:center;">Id</th>
            <th style="text-align:center;">Titre</th>
            <th style="text-align:center;">Texte</th>
            <th style="text-align:center;">Image</th>
            <th style="text-align:center;">Date d'ajout</th>
            <th colspan="2" style="text-align:center;">Actions</th>
        <?php } ?>
            <?php if ($titre == "utilisateurs bannis") { ?>
            <th style="text-align:center;">Id</th>
            <th style="text-align:center;">Pseudo</th>
            <th style="text-align:center;">Ville</th>
            <th style="text-align:center;">Téléphone</th>
            <th style="text-align:center;">Est admin</th>
            <th style="text-align:center;">Note moyenne</th>
            <th style="text-align:center;">Banni ?</th>
            <th colspan="2" style="text-align:center;">Actions</th>
        <?php } ?>
    </tr>

    <?php
    //var_dump($unmessage);
    foreach ($items as $unitem) {
        ?>
        <tr class="small">
            <?php if ($titre == "utilisateurs") { ?>
                <td><?php echo $unitem->getIdUser(); ?></td>
                <td><?php echo $unitem->getPseudo(); ?></td>
                <td><?php echo $unitem->getVille(); ?></td>
                <td><?php echo "0" . $unitem->getTel(); ?></td>
                <td><?php
                    if ($unitem->isAdmin()) {
                        echo "ADMIN";
                    } else {
                        echo "non";
                    }
                    ?></td>
                <td><?php echo $unitem->getMoyenne(); ?></td>
                <td><?php
                    if ($unitem->getEnBan()) {
                        echo "<span class=\"red\">Banni !!<span> [ " . $unitem->getNbBan() . " Ban(s) ]";
                    } else {
                        echo "[ " . $unitem->getNbBan() . " Ban(s) ]";
                    }
                    ?></td>
               

                       
                  <?php   ?></td>
                <td class="mini"><?php if (!$unitem->getEnBan()) 
                {echo "<a class=\"btn btn-xs btn-warning\" href=\"index.php?uc=admin&action=banUser&id=".$unitem->getIdUser()."\">Ban l'utilisateur</a>"; }
                else { 
                    echo "<a class=\"btn btn-xs btn-success\" href=\"index.php?uc=admin&action=debanUser&id=".$unitem->getIdUser()."\">De-ban l'utilisateur</a>";
                            
                    }?></td>
                    <td class="mini"><?php echo "<a class=\"btn btn-xs btn-danger\" href=\"index.php?uc=admin&action=deleteUser&id=".$unitem->getIdUser()."\">supprimer utilisateur</a>" ?></td>

    <?php } else if ($titre == "jeux") { ?>
                <td><?php echo $unitem->getIdJeu(); ?></td>
                <td><?php echo $unitem->getNom(); ?></td>
                <td><?php echo $unitem->getDescriptif(); ?></td>
                <td><?php echo $unitem->getEtat(); ?></td>
                <td><?php
                    $lesCat = $unitem->getLesCategories();
                    foreach ($lesCat as $unecategorie) {
                        echo substr($unecategorie, (7)) . "<br>";
                    }
                    ?></td>
                <td><?php echo $unitem->getNbJoueurs()->getNbJoueursMin() . " à " . $unitem->getNbJoueurs()->getNbJoueursMax(); ?></td>
                <td><?php echo $unitem->getIdDuree()->getDureeMin() . " / " . $unitem->getIdDuree()->getDureeMax() . ""; ?></td>
                <td><?php echo $unitem->getIdage()->getAgeMin() . " / " . $unitem->getIdage()->getAgeMax(); ?></td>
                <td><?php echo $unitem->getNote(); ?></td>
                <td><?php echo $unitem->getDateAjout(); ?></td>
                <td><?php if ($unitem->getImage()) { ?><img width="150" height="100" src="Vue/img/jeu/<?php echo $unitem->getImage(); ?>" /><?php } ?></td>
                <td><?php echo "<a class=\"btn btn-xs btn-danger\" href=\"index.php?uc=admin&action=deleteJeu&id=".$unitem->getIdJeu()."\">supprimer jeu</a>" ?></td>
    <?php } else if ($titre == "évènements") { ?>
                <td><?php echo $unitem->getIdEvenement(); ?></td>
                <td><?php echo $unitem->getTitre(); ?></td>
                <td><?php echo htmlentities($unitem->getEvenement()); ?></td>
                <td><?php if ($unitem->getLienImage()) { ?><img width="200" height="100" src="<?php echo $unitem->getLienImage(); ?>" /><?php } ?></td>
                <td><?php echo $unitem->getDateAjout(); ?></td>
                <td><?php echo "<a class=\"btn btn-xs btn-danger\" href=\"index.php?uc=admin&action=deleteEvenement&id=".$unitem->getIdEvenement()."\">Supprimer evenement</a>" ?></td>
                <td><?php echo "<a class=\"btn btn-xs btn-danger\" href=\"index.php?uc=admin&action=demModifEvenement&id=".$unitem->getIdEvenement()."\">Modifier evenement</a>" ?></td>
                    <?php
            }
            if ($titre == "utilisateurs bannis") {
                ?>
                <td><?php echo $unitem->getIdUser(); ?></td>
                <td><?php echo $unitem->getPseudo(); ?></td>
                <td><?php echo $unitem->getVille(); ?></td>
                <td><?php echo "0" . $unitem->getTel(); ?></td>
                <td><?php
                    if ($unitem->isAdmin()) {
                        echo "ADMIN";
                    } else {
                        echo "non";
                    }
                    ?></td>
                <td><?php echo $unitem->getMoyenne(); ?></td>
                <td><?php
                    if ($unitem->getEnBan()) {
                        echo "<span class=\"red\">Banni !!<span> [ " . $unitem->getNbBan() . " Ban(s) ]";
                    } else {
                        echo "[ " . $unitem->getNbBan() . " Ban(s) ]";
                    }
                    ?></td>
                <td class="mini"><?php echo "<a class=\"btn btn-xs btn-success\" href=\"index.php?uc=admin&action=debanUser&id=".$unitem->getIdUser()."\">De-ban l'utilisateur</a>" ?>
                <td class="mini">    <?php echo "<a class=\"btn btn-xs btn-danger\" href=\"index.php?uc=admin&action=deleteUser&id=".$unitem->getIdUser()."\">supprimer utilisateur</a>" ?>
                </td>
                </td>
    <?php
    }
}
?>
    </tr>
</table>

<?php include('v_footer.php'); ?>
