<?php include('v_header.php'); ?>
<form id="start" action="POST">
	<h4 class="titreformulaire">Identification Joueur</h4>
	<p class="pform">
		<label for="nom">Login :</label>
		<input id="name" type="text" />
	</p>
	<p class="pform">
		<label for="prenom">Mot de passe :</label>
		<input id="passe" type="text" />
	</p>
	<p class="pform">
		<a class="submit" id="go">Envoyer</a>
	</p>
</form>
</div>
<div id="titre"></div>

<?php
include('v_footer.php');   

?>