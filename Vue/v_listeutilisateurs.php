<?php include('v_header.php'); ?>
<section class='container'>
    <form class="form-horizontal" action="index.php?uc=dashboard&action=demarrerEmprunt" method="POST">
        <div class="form-group">
            <h3>Choisissez le prêteur à contacter</h3>
            <label for="sel1">Liste des utilisateurs:</label>
            <select class="form-control" name="preteur" required="">
                <option disabled="" selected>Sélectionnez un utilisateur...</option>
                <?php
                $daoexemplaire = new ExemplaireDAO();
                foreach ($utils as $unUtil) {
                    $id = $unUtil->getIdUser();
                    $exemplaires = $daoexemplaire->findParIdUser($id);
                    if ($id != $_SESSION['id'] && !empty($exemplaires)) {
                        ?><option value="<?php echo $unUtil->getIdUser(); ?>"><?php echo $unUtil->getPseudo(); ?></option><?php
                    }
                }
                ?>
            </select>
        </div>
        <div class="form-group">        
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Valider</button>
                <INPUT class="btn btn-default" TYPE="BUTTON" VALUE="Annuler" onClick="history.back()">
            </div>
        </div>
    </form>
</section>

<?php
include('v_footer.php');

