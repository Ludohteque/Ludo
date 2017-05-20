<?php include('v_header.php'); 
$trancheagedao = new TrancheAgeDAO;
$categoriedao = new CategorieDAO;
$nombrejoueursdao = new NombreJoueursDAO;
$dureedao = new DureeDAO;
?>

<section class='container'>
    <h2>Nouveau jeu</h2></br>
    
    <form class="form-horizontal" id="newjeuform" action="index.php?uc=admin&action=valideNouveaujeu" method="POST" enctype="multipart/form-data">


        <div class="form-group">
            <label class="control-label col-sm-2" for="nom">Nom du jeu :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nom" name="nom" placeholder="Entrez un nom de jeu" required="true">
            </div>
        </div>
                <div class="form-group">
            <label class="control-label col-sm-2" for="descriptif">Description :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="descriptif" name="descriptif" placeholder="Entrez une description" required="true">
            </div>
        </div>
                        <div class="form-group">
            <label class="control-label col-sm-2" for="etat">Etat initial du jeu neuf :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="etat" name="etat" placeholder="Entrez un etat" required="true">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="age">Tranche d'âge :</label>
            <div class="col-sm-10">
                <select class="form-control" id="age" name="age" required="true">
                    <option disabled selected>Choisissez une tranche d'âge</option>
                    <?php $tranches = $trancheagedao->findAll();
                    foreach ($tranches as $unetranche) { ?>                      
                    <option value="<?php echo $unetranche->getIdAge(); ?>"><?php echo $unetranche->getAgeMin()." ans / ".$unetranche->getAgeMax()." ans"; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
                <div class="form-group">
            <label class="control-label col-sm-2" for="duree">Durée de jeu :</label>
            <div class="col-sm-10">
                <select class="form-control" id="duree" name="duree" required="true">
                    <option disabled selected>Choisissez une durée de jeu</option>
                    <?php $durees = $dureedao->findAll();
                    foreach ($durees as $uneduree) { ?>                      
                    <option value="<?php echo $uneduree->getIdDuree(); ?>"><?php echo $uneduree->getDureeMin()." minutes / ".$uneduree->getDureeMax()." minutes"; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="categories">Catégories :</label>
            <div class="col-sm-10">
                <?php $categories = $categoriedao->findCategories(); ?>
                    <?php
                    foreach ($categories as $unecategorie) { ?>                      
                <input type="checkbox" class="categories[]" name="categories[]" value="<?php echo $unecategorie ?>"><?php echo $unecategorie; ?></input></br>
                    <?php } ?>
            </div>
        </div>
                <div class="form-group">
            <label class="control-label col-sm-2" for="nbjoueurs">Nombre de joueurs :</label>
            <div class="col-sm-10">
                <select class="form-control" id="nbjoueurs" name="nbjoueurs" required="true">
                    <option disabled selected>Choisissez un nombre de joueurs</option>
                    <?php $nbjoueurs = $nombrejoueursdao->findAll();
                    foreach ($nbjoueurs as $unnbjoueur) { ?>                      
                    <option value="<?php echo $unnbjoueur[0]; ?>"><?php echo $unnbjoueur['nb_joueur_min']." à ".$unnbjoueur['nb_joueur_max']." joueurs"; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="form-group">
                            <label for="image" class="col-lg-2 control-label">Illustration :</label>
                            <div class="col-lg-10">
                                <input type="file" class="form-control" id="image" name="image" accept="image/*" required="true"></input>
                            </div>
                        </div>
        <div class="form-group">        
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" id="newjeuvld" class="btn btn-default">Envoyer</button>
                <INPUT class="btn btn-default" TYPE="BUTTON" VALUE="Annuler">
            </div>
        </div>
    </form>
</section>


<?php
include('v_footer.php');
