<?php include('v_header.php'); ?>
<h5>Ma Dashboard :</h5>
<section class="tabs">
    <input id="tab-1" type="radio" name="radio-set" class="tab-selector-1" checked="checked" />
    <label for="tab-1" class="tab-label-1">Signalements :</label>

    <input id="tab-2" type="radio" name="radio-set" class="tab-selector-2" />
    <label for="tab-2" class="tab-label-2">Demande ajout :</label>



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

                <?php //class="width60"
                foreach ($demandesajout as $unjeu) {
                    ?>
                    <tr> 
                        <td><?php echo $unjeu->getNom(); ?></td>
                        <td><?php echo $unjeu->getDateAjout(); ?></td>
                        <td><?php echo $unjeu->getDescriptif(); ?></td>
                        <td><?php echo $unjeu->getIdDuree()->getDureeMin()." / ".$unjeu->getIdDuree()->getDureeMax().""; ?></td>
                        <td><?php echo $unjeu->getIdage()->getAgeMin()." / ".$unjeu->getIdage()->getAgeMax(); ?></td>
                        <td><?php echo "à faire" //$unjeu->getNbJoueurs()->getNbJoueursMin()." / ".$unjeu->getNbJoueurs()->getNbJoueursMax(); ?></td>
                        <td><?php var_dump($unjeu->getLesCategories());echo "???";
                        
                        //foreach ($unjeu->getLesCategories() as $unecategorie){
                            //echo $unecategorie->getNomCat();
                        //}; 
                        ?></td>
                        <td><?php echo $unjeu->getEtat(); ?></td>
                        <td><img src="<?php echo $unjeu->getImage(); ?>" /></td>
                    </tr>
<?php } ?>
            </table>

        </div>

    
</div>
</section>




<?php
include('v_footer.php');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


