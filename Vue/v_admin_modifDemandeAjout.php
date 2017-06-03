<?php
include('v_header.php');
$trancheagedao = new TrancheAgeDAO;
$categoriedao = new CategorieDAO;
$nombrejoueursdao = new NombreJoueursDAO;
$dureedao = new DureeDAO;
?>

<section class='container'>
    <h2>Modification d'un jeu</h2></br>

    <form class="form-horizontal" id="demandeJeuModif" action="index.php?uc=admin&action=okmodifDemandeJeu&id=<?php echo $jeu->getIdJeu(); ?>" method="POST" enctype="multipart/form-data">


        <div class="form-group">
            <label class="control-label col-sm-2" for="nom">Nom du jeu :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $jeu->getnomJeu() ?>" required="true">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="descriptif">Description :</label>
            <div class="col-sm-10">
                <textarea rows="5" required="true" type="text" class="form-control" id="descriptif" name="descriptif" value="<?php echo $jeu->getDescriptif() ?>" required="true"><?php echo $jeu->getDescriptif() ?></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="etat">Etat initial du jeu neuf :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="etat" name="etat" value="<?php echo $jeu->getEtat() ?>" required="true">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="age">Tranche d'âge :</label>
            <div class="col-sm-10">
                <select class="form-control" id="age" name="age" required="true">
                    <?php $ageActuel = $jeu->getIdAge(); ?>
<!--                    <option selected value="<?php $ageActuel; ?>"><?php echo $ageActuel->getAgeMin() . " ans / " . $ageActuel->getAgeMax() . " ans"; ?></option>-->
                    <?php
                    $tranches = $trancheagedao->findAll();
                    foreach ($tranches as $unetranche) {
                        var_dump($unetranche);
                        ?>                      
                        <option value="<?php echo $unetranche->getIdAge(); ?>"<?php
                        if ($ageActuel->getIdAge() == $unetranche->getIdAge()) {
                            echo ' selected="selected"';
                        }
                        ?>><?php echo $unetranche->getAgeMin() . " ans / " . $unetranche->getAgeMax() . " ans"; ?></option>
                            <?php } ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="duree">Durée de jeu :</label>
            <div class="col-sm-10">

                <select class="form-control" id="duree" name="duree" required="true">
                    <?php $dureeActuelle = $jeu->getIdDuree(); ?>

                    <?php
                    $durees = $dureedao->findAll();
                    foreach ($durees as $uneduree) {
                        ?>                      
                        <option value="<?php echo $uneduree->getIdDuree(); ?>"<?php
                        if ($dureeActuelle->getIdDuree() == $uneduree->getIdDuree()) {
                            echo ' selected="selected"';
                        }
                        ?>><?php echo $uneduree->getDureeMin() . " minutes / " . $uneduree->getDureeMax() . " minutes"; ?></option>
                            <?php } ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="categories">Catégories :</label>
            <div class="col-sm-10">
                <?php $categories = $categoriedao->findCategories(); ?>
                <?php foreach ($categories as $unecategorie) { ?>                      
                    <input type="checkbox" class="categories[]" name="categories[]" value="<?php echo $unecategorie; ?>" <?php
                    if (in_array($unecategorie, $jeu->getlesCategories())) {
                        echo "checked";
                    }
                    ?> ><?php echo " - " . $unecategorie; ?></input></br>
                       <?php } ?>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="nbjoueurs">Nombre de joueurs :</label>
            <div class="col-sm-10">
                <select class="form-control" id="nbjoueurs" name="nbjoueurs" required="true">
                    <?php $nbjoueursActuel = $jeu->getNbJoueurs(); ?>
                    <!--<option selected  value="<?php $nbjoueursActuel; ?>"><?php echo $nbjoueursActuel->getNbJoueursMin() . " à " . $nbjoueursActuel->getNbJoueursMax() . " joueurs"; ?></option>-->
                    <?php
                    $nbjoueurs = $nombrejoueursdao->findAll();
                    foreach ($nbjoueurs as $unnbjoueur) {
                        ?>                      
                        <option value="<?php echo $unnbjoueur[0]; ?>"<?php
                        if ($nbjoueursActuel->getIdNbJoueurs() == $unnbjoueur[0]) {
                            echo ' selected="selected"';
                        }
                        ?>><?php echo $unnbjoueur['nb_joueur_min'] . " à " . $unnbjoueur['nb_joueur_max'] . " joueurs"; ?></option>
                            <?php } ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="image" class="col-lg-2 control-label">Illustration :</label>
            <div class="col-lg-10">
                <input type="file" class="form-control heightfix" id="image" name="image" accept="image/*" value=\"Vue/img/jeu<?php
                if ($jeu->getImage()) {
                    echo $jeu->getImage();
                }
                ?>"><?php
                       if ($jeu->getImage()) {
                           echo $jeu->getImage();
                       }
                       ?></input>
            </div>
        </div>
        <?php
        if ($jeu->getImage()) {
            ?>
            <div class="form-group">
                <label for="dummy" class="col-lg-2 control-label">Image actuelle :</label>
                <div class="col-lg-10">

                    <img width="200" height="100" src="Vue/img/jeu/<?php echo $jeu->getImage(); ?>" />
                </div>
            </div>
        <?php } ?>
        <div class="form-group">        
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" id="modifdmdvld" class="btn btn-default">Envoyer</button>
                <INPUT class="btn btn-default" TYPE="BUTTON" VALUE="Annuler" onClick="history.back()">
            </div>
        </div>
    </form>
</section>


<?php
include('v_footer.php');
