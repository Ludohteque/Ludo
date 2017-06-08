<?php include('v_header.php'); ?>
<h5>Dashboard d'administration :</h5>
<?php
if (isset($messageEnvoye)) {
    echo "<div class='message'>" . $resultat . "</div>";
}
?>
<section class="tabs">
    <input id="tab-1" type="radio" name="radio-set" class="tab-selector-1" checked="checked" />
    <label for="tab-1" class="tab-label-1">Signalements :</label>

    <input id="tab-2" type="radio" name="radio-set" class="tab-selector-2" />
    <label for="tab-2" class="tab-label-2">Renseignements :</label>
    
    <input id="tab-3" type="radio" name="radio-set" class="tab-selector-3" />
    <label for="tab-3" class="tab-label-3">Demande ajout :</label>

    <input id="tab-4" type="radio" name="radio-set" class="tab-selector-4" />
    <label for="tab-4" class="tab-label-4">Actions :</label>

    <div class="clear-shadow"></div>

    <div class="content">
        <div class="content-1">
            </br>
            <table class="tableau">
                <tr class="tableauTete">
                    <th style="text-align:center;">Utilisateur</th>
                    <th style="text-align:center;">Sujet</th>
                    <th style="text-align:center;">Corps</th>
                    <th colspan="2" style="text-align:center;">Actions</th> 
                </tr>

                <?php
                //var_dump($unmessage);
                foreach ($signalements as $unmessage) {
                    ?>
                    <tr>
                        <td><?php echo $unmessage->getIdExpediteur()->getPseudo(); ?></td>
                        <td><?php echo $unmessage->getSujet(); ?></td>
                        <td class="width60"><?php echo $unmessage->getCorps(); ?></td>
                        <td><?php if (UserDAO::estConnecte() && UserDAO::isAdmin()) {
                            echo "<a class=\"btn btn-sm btn-block btn-info\" href=\"index.php?uc=dashboard&action=reponseAdmin&id=".$unmessage->getIdMessage()."\">Répondre</a>";
                            ?></td>
                        <td class="mini"><?php
                            echo "<a class=\"btn btn-sm btn-block btn-danger confirm\" href=\"index.php?uc=admin&action=effacerSignalement&id=".$unmessage->getIdMessage()."\">Supprimer</a>";
                        }
                        ?></td>
                    </tr>
                <?php } ?>
            </table>

        </div>
        
        <div class="content-2">
            </br>
            <table class="tableau">
                <tr class="tableauTete">
                    <th style="text-align:center;">Utilisateur</th>
                    <th style="text-align:center;">Sujet</th>
                    <th style="text-align:center;">Corps</th>
                    <th colspan="2" style="text-align:center;">Actions</th> 
                </tr>

                <?php
                //var_dump($unmessage);
                foreach ($renseignements as $unmessage) {
                    ?>
                    <tr>
                        <td><?php echo $unmessage->getIdExpediteur()->getPseudo(); ?></td>
                        <td><?php echo $unmessage->getSujet(); ?></td>
                        <td class="width60"><?php echo $unmessage->getCorps(); ?></td>
                        <td><?php if (UserDAO::estConnecte() && UserDAO::isAdmin()) {
                            echo "<a class=\"btn btn-sm btn-block btn-info\" href=\"index.php?uc=dashboard&action=reponseAdmin&id=".$unmessage->getIdMessage()."\">Répondre</a>";
                            ?></td>
                        <td class="mini"><?php
                            echo "<a class=\"btn btn-sm btn-block btn-danger confirm\" href=\"index.php?uc=admin&action=effacerRenseignement&id=".$unmessage->getIdMessage()."\">Supprimer</a>";
                        }
                        ?></td>
                    </tr>
                <?php } ?>
            </table>

        </div>

        <div class="content-3">
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
                    <th colspan="3" style="text-align:center;">Actions</th>
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
                        <td><?php if ($unjeu->getImage()) { ?><img width="150" height="100" src="Vue/img/jeu/<?php echo $unjeu->getImage(); ?>" /><?php } ?></td>
                        <td style="text-align: center;" class="mini"><?php
                        if (UserDAO::estConnecte() && UserDAO::isAdmin()) {
                            echo "<a class=\"btn btn-sm btn-block btn-info\" href=\"index.php?uc=admin&action=valideAjout&id=".$unjeu->getIdJeu()."\">Valider</a>";
                            ?></td>
                        <td class="mini"><?php
                            echo "<a class=\"btn btn-sm btn-block btn-danger confirm\" href=\"index.php?uc=admin&action=deleteJeu&id=".$unjeu->getIdJeu()."\">Supprimer</a>";
                        
                        ?></td>
                        <td class="mini"><?php
                            echo "<a class=\"btn btn-sm btn-block btn-danger\" href=\"index.php?uc=admin&action=modifDemandeJeu&id=".$unjeu->getIdJeu()."\">Modifier</a>";
                        }
                        ?></td>
                    </tr>
                <?php } ?>
            </table>

        </div>
        <div class="content-4">
            <table class="tableau">
                <tr class="">
                    <td style="text-align:center;">Administration des Utilisateurs</td>
                    <td style="text-align: center;" class="mini"><?php
                        if (UserDAO::estConnecte() && UserDAO::isAdmin()) {
                            echo "<a class=\"btn btn-block btn-info\" href=\"index.php?uc=admin&action=banAdmin\">Bannissements</a>";
                            ?></td>
                        <td class="mini"><?php
                            echo "<a class=\"btn btn-block btn-info\" href=\"index.php?uc=admin&action=userAdmin\">Tous les Utilisateurs</a>";
                        }
                        ?></td>

                </tr>
                <tr class="">
                    <td style="text-align:center;">Administration des Jeux</td>
                    <td style="text-align: center;" class="mini"><?php
                        if (UserDAO::estConnecte() && UserDAO::isAdmin()) {
                            echo "<a class=\"btn btn-block btn-success\" href=\"index.php?uc=admin&action=demandeNouveaujeu\">Nouveau jeu</a>";
                            ?></td>
                        <td class="mini"><?php
                            echo "<a class=\"btn btn-block btn-info\" href=\"index.php?uc=admin&action=jeuxAdmin\">Tous les Jeux</a>";
                        }
                        ?></td>

                </tr>
                <tr class="">
                    <td style="text-align:center;">Administration d'évènements</td>
                    <td style="text-align: center;" class="mini"><?php
                        if (UserDAO::estConnecte() && UserDAO::isAdmin()) {
                            echo "<a class=\"btn btn-block btn-success\" href=\"index.php?uc=admin&action=demandeNouveleven\">Nouvel Evenement</a>";
                            ?></td>
                        <td class="mini"><?php
                            echo "<a class=\"btn btn-block btn-info\" href=\"index.php?uc=admin&action=evenementsAdmin\">Tous les Evenements</a>";
                        }
                        ?></td>

                </tr>
            </table>
        </div>
    </div>

</section>
<?php include('v_footer.php'); ?>






