<?php include('v_header.php'); ?>

<section class='container'>
    <h2>Gestion de l'emprunt</h2>
    <form class="form-horizontal" action="index.php?uc=dashboard&action=envoyerMessage" method="POST">


        <div class="form-group">
            <label class="control-label col-sm-2" for="preteur">Prêteur:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="preteur" name="preteur"  value="<?php echo $_SESSION['pseudo']; ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="emprunteur">Emprunteur:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="emprunteur" name="emprunteur" value='<?php echo $user->getPseudo(); ?>' >
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
                <textarea class="form-control" rows="5" id="corps" name="corps" placeholder="Entrez le corps de votre message"></textarea>
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
