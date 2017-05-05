<?php include('v_header.php'); ?>
<form id="start" method="POST" action="index.php?uc=connexion&action=valideConnexion" >
    <h4 class="titreformulaire">Identification Joueur</h4>
    <p class="pform">
        <label for="nom">Login :</label>
        <input id="name" name="login" type="text" />
    </p>
    <p class="pform">
        <label for="prenom">Mot de passe :</label>
        <input id="passe" name="mdp" type="password" />
    </p>
    </br>
    <p class="pform">
        <button class="submit" id="go">Envoyer</button>
    </p>
    <?php
    if ($joueur == null) {
        echo "<div class='message'>Erreur de login et/ou mot de passe. Veuillez réessayer.</div>";
    }
    ?>
</form>
<div id="titre"></div>

<?php
include('v_footer.php');
?>
