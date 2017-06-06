<?php
include('Vue/v_header.php');
?>
<section class='container'>
    <h2>Modification du profil</h2>
    <form class="form-horizontal" method="POST" action="index.php?uc=dashboard&action=modifProfil" onSubmit="return validation(this)">
        <div class="form-group">
            <label class="control-label col-sm-2">Pseudo:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="Pseudo" value="<?php echo $user->getPseudo(); ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">Ville:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="Ville" value="<?php echo $user->getVille(); ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">Email:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="Email" value="<?php echo $user->getMail(); ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">Téléphone:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="Telephone" value="<?php echo $user->getTel(); ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">Nouveau mot de passe:</label>
            <div class="col-sm-10">
                <input class="form-control" name="mdp1" type="password">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">Confirmer mot de passe:</label>
            <div class="col-sm-10">
                <input class="form-control" type="password" name="mdp2">
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
include('Vue/v_footer.php');



