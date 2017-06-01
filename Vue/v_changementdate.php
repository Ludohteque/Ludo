<?php include('v_header.php'); ?>
<section class='container'>
    <form class="form-horizontal" action="index.php?uc=dashboard&action=validerDate" method="POST">
        <div class="form-group">
            <h3>Choisissez une nouvelle date</h3>
            <label class="control-label col-sm-2" for="date">Date limite de rendu:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="date" name="date" placeholder="AAAA-MM-JJ" required="">
            </div>
        </div>
        <div class="form-group">        
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Valider</button>
                <INPUT class="btn btn-default" TYPE="BUTTON" VALUE="Annuler" onClick="history.back()">
            </div>
        </div>
        <input name="id" value="<?php echo $id;?>" hidden>
    </form>
</section>
<?php
include('v_footer.php');

