<?php include('v_header.php'); ?>

<section class='container'>
    <h2>Gestion de l'emprunt</h2>
    <form class="form-horizontal" action="index.php?uc=dashboard&action=ajoutPret" method="POST">


        <div class="form-group">
            <label class="control-label col-sm-2" for="preteur">Prêteur:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="preteur" value="<?php echo $user->getPseudo(); ?>" readonly="">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="emprunteur">Emprunteur:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="emprunteur" value='<?php echo $_SESSION['pseudo']; ?>' readonly="">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="sujet">Sujet:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="sujet" name="sujet" value="Demande de prêt" required="">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="date">Date limite de rendu:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="date" name="date" placeholder="AAAA-MM-JJ" required="">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="jeu">Jeu concerné:</label>
            <div class="col-sm-10">
                <?php
                $exemplairedao = new ExemplaireDAO();
                $mesExemplaires = $exemplairedao->findParIdUser($user->getIdUser());
                ?>
                <select class="form-control" name="exemplaire" required="">
                    <option disabled="" selected>Sélectionnez un jeu...</option>
                    <?php
                    foreach ($mesExemplaires as $unExemplaire) {
                        if ($unExemplaire->getDisponibilite() == 1) {
                            ?><option value='<?php echo $unExemplaire->getIdExemplaire(); ?>'><?php echo "N° " . $unExemplaire->getIdExemplaire() . " - " . $unExemplaire->getIdJeu()->getNom(); ?></option><?php
                        }
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group">        
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Envoyer</button>
                <INPUT class="btn btn-default" TYPE="BUTTON" VALUE="Annuler" onClick="history.back()">
            </div>
        </div>
    </form>
</section>


<?php
include('v_footer.php');
