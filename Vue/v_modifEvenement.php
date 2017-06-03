<?php include('v_header.php');
?>

<section class="container">
    <form id="form-horizontal" action="index.php?uc=admin&action=valideModifEven&id=<?php echo $evenement->getIdEvenement(); ?>" method="POST" enctype="multipart/form-data">
        <h2>Formulaire de modification d'événement :</h2>
        </br>
       
	<div class="form-group">
		<label class="control-label col-sm-2" for="evenement">Titre de l'événement :</label>
                <div class="col-sm-10">
		<input class="form-control" id="titre" name="titre" type="text"  required="true" value ="<?php echo $evenement->getTitre(); ?>"/><span class="red">*</span>
                </div>
	</div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="texte">Texte de l'événement :<span class="red"></span></label>
                <div class="col-sm-10">
		<textarea class="form-control" id="evenement" name="evenement" type="text" rows="10" required="true" ><?php echo $evenement->getEvenement(); ?></textarea><span class="red">*</span></br>
                </div>
	</div>
        </br>
	<div class="form-group">
                            <label for="image" class="col-lg-2 control-label">Illustration :</label>
                            <div class="col-lg-10">
                                <input type="file" class="form-control" id="image" name="image" accept="image/*"></input><span class="red">*</span>
                            </div>
                        </div>
        <div class="form-group">
        
		<button class="submit" id="go">Envoyer</button>
                <button class="reset" type="reset" id="gfy">Retour</button>
        </div>
    </form>
</section>

<?php
include('v_footer.php');   

?>
