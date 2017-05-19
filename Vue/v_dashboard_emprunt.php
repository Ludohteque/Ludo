<?php include('v_header.php'); ?>

<section class='container'>
    <h2>Gestion de l'emprunt</h2>
    <form class="form-horizontal" action="index.php?uc=dashboard&action=envoyerMessage" method="POST">


        <div class="form-group">
            <label class="control-label col-sm-2" for="expediteur">Prêteur:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="expediteur" name="expediteur"  value="<?php echo $_SESSION['pseudo']; ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="destinataire">Emprunteur:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="destinataire" name="destinataire" value='<?php echo $user->getPseudo(); ?>' >
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="sujet">Sujet:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="sujet" name="sujet" value="Confirmation d'emprunt">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="retour">Retour dans:</label>
            <div class="col-sm-10">
                <select class="form-control" id="retour" name="retour">
                    <option>1 semaine</option>
                    <option>2 semaines</option>
                    <option>3 semaines</option>
                    <option>Plus de 4 semaines</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="jeu">Jeu concerné:</label>
            <div class="col-sm-10">
                <?php
                $exemplairedao = new ExemplaireDAO();
                $mesExemplaires = $exemplairedao->findParIdUser($_SESSION['id']);
                ?>
                <select class="form-control" id="jeu" name="jeu">
                    <?php
                    foreach ($mesExemplaires as $unExemplaire) {
                        ?><option value='<?php echo $unExemplaire->getIdExemplaire();?>'><?php echo "N° ".$unExemplaire->getIdExemplaire()." - ". $unExemplaire->getIdJeu()->getNom(); ?></option><?php
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group">        
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Envoyer la confirmation</button>
                <INPUT class="btn btn-default" TYPE="BUTTON" VALUE="Annuler" onClick="history.back()">
            </div>
        </div>
    </form>
</section>


<?php
include('v_footer.php');
