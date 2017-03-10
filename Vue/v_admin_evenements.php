<?php include('v_header.php');
?>

<div class="containform">
    <form id="start" action="index.php?uc=evenement&action=ajouterEvenement" method="POST">
        <h4 class="titreformulaire">Formulaire d'insertion d'événement :</h4>
        </br>
	<p class="pform">
		<label for="evenement">Titre de l'événement :</label>
		<input id="evenement" name="evenement" type="text" /><span class="red">*</span>
	</p>
        </br>
	<p class="pform">
		<label for="image">Nom de fichier :</label>
		<input id="image" name="image" type="text" /><span class="red">*</span>
        </p>
        <p class="pform">
		<button class="submit" id="go">Envoyer</button>
                <button class="reset" type="reset" id="gfy">Reset</button>
        </p>
    </form>


<?php
include('v_footer.php');   

?>
