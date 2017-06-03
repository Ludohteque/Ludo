<?php include('v_header.php'); ?>

<section class='container'>
    <h2>Envoyer un message</h2>
    <form class="form-horizontal" action="index.php?uc=dashboard&action=envoyerMessage" method="POST">


        <div class="form-group">
            <label class="control-label col-sm-2" for="expediteur">Expéditeur:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="expediteur" name="expediteur"  value="<?php echo $_SESSION['pseudo']; ?>" readonly="">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="destinataire">Destinataire:</label>
            <div class="col-sm-10">
                <?php
                if (isset($user)) {
                    if ($user != null) {
                        ?><input type="text" class="form-control" id="destinataire" name="destinataire" value='<?php echo $user->getPseudo(); ?>' readonly=""><?php
                    }
                } else {
                    ?>
                    <input type="text" class="form-control" id="destinataire" name="destinataire" placeholder="Entrez le destinataire" required><?php
                }
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="type">Type:</label>

            <div class="col-sm-10">
                <select class="form-control" id="type" name="type" required>
                    <?php if (isset($type)) { ?>
                        <option disabled="" selected><?php echo $type; ?></option>
                    <?php } else { ?>
                        <option disabled="" selected>Sélectionnez un type...</option>
                        <option>Demande de prêt</option>
                        <option>Questions diverses</option>
                    <?php } ?>

                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="sujet">Sujet:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="sujet" name="sujet" placeholder="Entrez le sujet">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="corps">Corps:</label>
            <div class="col-sm-10">
                <textarea class="form-control" rows="5" id="corps" name="corps" placeholder="Entrez le corps de votre message" required></textarea>
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
