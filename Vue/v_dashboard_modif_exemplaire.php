<?php include('v_header.php'); ?>

<section class='container'>
    <h2>Modifier votre jeu</h2>
    <form class="form-horizontal" action="index.php?uc=dashboard&action=valideModifExemplaire&id=<?php echo $exemplaire->getIdExemplaire(); ?>" method="POST">

        <div class="form-group">
            <label class="control-label col-sm-2" for="jeu">Choisissez un jeu:</label>
            <div class="col-sm-10">
                <select class="form-control" id="type" name="jeu" disabled>
                    <option disabled><?php echo $exemplaire->getNom(); ?> </option>                    
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="etat">Etat:</label>
            <div class="col-sm-10">
                <textarea class="form-control" rows="5" id="etat" name="etat" placeholder="Entrez l'état global de votre jeu" required><?php echo $exemplaire->getEtat(); ?></textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2">Disponibilité:</label>
            <div class="col-sm-10">
                <label class="radio-inline"><input type="radio" name="dispo" value="1"<?php if ($exemplaire->getDisponibilite()==1) { echo " checked"; } ?>>Disponible</label>
                <label class="radio-inline"><input type="radio" name="dispo" value="0"<?php if ($exemplaire->getDisponibilite()==0) { echo " checked"; } ?>>Non disponible</label>
            </div>
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
