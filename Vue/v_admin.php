<?php include('v_header.php'); ?>
<h5>Ma Dashboard :</h5>
<?php
if ($messageEnvoye) {
    echo "<div class='message'>" . $resultat . "</div>";
}
?>
<section class="tabs">
    <input id="tab-1" type="radio" name="radio-set" class="tab-selector-1" checked="checked" />
    <label for="tab-1" class="tab-label-1">Signalements :</label>

    <input id="tab-2" type="radio" name="radio-set" class="tab-selector-2" />
    <label for="tab-2" class="tab-label-2">Demande ajout :</label>

    <input id="tab-3" type="radio" name="radio-set" class="tab-selector-3" />
    <label for="tab-3" class="tab-label-3">Actions :</label>

    <div class="clear-shadow"></div>

    <div class="content">
        <div class="content-1">
            </br>
            <table class="tableau">
                <tr class="tableauTete">
                    <th style="text-align:center;">Utilisateur</th>
                    <th style="text-align:center;">Sujet</th>
                    <th style="text-align:center;">Corps</th> 
                </tr>

                <?php
                //var_dump($unmessage);
                foreach ($signalements as $unmessage) {
                    ?>
                    <tr>
                        <td><?php echo $unmessage[0]; ?></td>
                        <td><?php echo $unmessage[1]; ?></td>
                        <td class="width60"><?php echo $unmessage[2]; ?></td>
                    </tr>
                <?php } ?>
            </table>

        </div>



        <div class="content-2">
            </br>
            <table class="tableau">
                <tr class="tableauTete">
                    <th style="text-align:center;">Jeu</th>
                    <th style="text-align:center;">Date de la demande</th>
                    <th style="text-align:center;">Descriptif</th>
                    <th style="text-align:center;">Durée (min/max)</th>
                    <th style="text-align:center;">Age (min/max)</th>
                    <th style="text-align:center;">Nombre de joueurs</th>
                    <th style="text-align:center;">Categories</th>
                    <th style="text-align:center;">Etat</th>
                    <th style="text-align:center;">Photo</th>
                </tr>

                <?php
                //class="width60"
                foreach ($demandesajout as $unjeu) {
                    ?>
                    <tr> 
                        <td><?php echo $unjeu->getNom(); ?></td>
                        <td><?php echo $unjeu->getDateAjout(); ?></td>
                        <td><?php echo $unjeu->getDescriptif(); ?></td>
                        <td><?php echo $unjeu->getIdDuree()->getDureeMin() . " / " . $unjeu->getIdDuree()->getDureeMax() . ""; ?></td>
                        <td><?php echo $unjeu->getIdage()->getAgeMin() . " / " . $unjeu->getIdage()->getAgeMax(); ?></td>
                        <td><?php echo $unjeu->getNbJoueurs()->getNbJoueursMin() . " à " . $unjeu->getNbJoueurs()->getNbJoueursMax(); ?></td>
                        <td><?php
                            $lesCat = $unjeu->getLesCategories();
                            foreach ($lesCat as $unecategorie) {
                                echo $unecategorie . "<br>";
                            };
                            ?></td>
                        <td><?php echo $unjeu->getEtat(); ?></td>
                        <td><img src="<?php echo $unjeu->getImage(); ?>" /></td>
                    </tr>
                <?php } ?>
            </table>

        </div>
        <div class="content-3">
            <table class="tableau">
                <tr class="">
                    <td style="text-align:center;">Administration des Utilisateurs</td>
                    <td style="text-align: center;"><?php
                        if (UserDAO::estConnecte() && UserDAO::isAdmin()) {
                            echo "<a class=\"btn btn-danger\" href=\"index.php?uc=admin&action=userAdmin\">Utilisateurs</a>";
                        }
                        ?></td>

                </tr>
                <tr class="">
                    <td style="text-align:center;">Administration des Jeux</td>
                    <td style="text-align: center;"><?php
                        if (UserDAO::estConnecte() && UserDAO::isAdmin()) {
                            echo "<a class=\"btn btn-primary\" href=\"index.php?uc=admin&action=demandeNouveaujeu\">Nouveau jeu</a>";
                            echo "<a class=\"btn btn-danger\" href=\"index.php?uc=admin&action=jeuxAdmin\">Jeux</a>";
                        }
                        ?></td>

                </tr>
                <tr class="">
                    <td style="text-align:center;">Administration d'évènements</td>
                    <td style="text-align: center;"><?php
                        if (UserDAO::estConnecte() && UserDAO::isAdmin()) {
                            echo "<a class=\"btn btn-danger\" href=\"index.php?uc=admin&action=evenementsAdmin\">Evenements</a>";
                        }
                        ?></td>

                </tr>
            </table>
        </div>
    </div>

</section>
<?php include('v_footer.php'); ?>






