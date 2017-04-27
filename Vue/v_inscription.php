<?php include('v_header.php');
?>
<div class="containform">
    <form id="start" action="index.php?uc=inscription&action=valideInscription" method="POST" onsubmit="return verifForm(this)">
        <h4 class="titreformulaire">Formulaire d'inscription du joueur :</h4>
        </br>
        <p class="pform">
            <label for="pseudo">Choisissez votre Pseudo :</label>
            <input id="pseudo" name="pseudo" type="text" onblur="verifPseudo(this)"/><span class="red">*</span>
        </p>
        </br>
        <p class="pform">
            <label for="passe">Et votre Mot de passe :</label>
            <input id="passe" name="passe" type="password" onblur="verifPasse(this)"/><span class="red">*</span>
        </p>
        <p class="pform">
            <label for="passe">Retapez votre Mot de passe :</label>
            <input id="passe2" type="password" onblur="verifpasse2(this)"/><span class="red">*</span>
        </p>
        </br>
        <p class="pform">
            <label for="ville">Entrez votre ville :</label>
            <input id="ville" name="ville" type="text" onblur="verifVille(this)"/><span class="red">*</span>
        </p>
        </br>
        <p class="pform">
            <label for="mail">Entrez votre adresse mail :</label>
            <input id="mail" name="mail" type="text" onblur="isEmail(this)"/><span class="red">*</span>
        </p>
        <p class="pform">
            <label for="mail">Retapez votre adresse mail :</label>
            <input id="mail2" type="text" onblur="isEmail(this)"/><span class="red">*</span>
        </p>
        </br>
        <p class="pform">
            <label for="phone">Tapez votre numéro de téléphone :  </label>
            <input id="phone" name="phone" type="text" onblur="verifTel(this)"/><span class="red">*</span>
        </p>
        <p id="right"><span class="red">*</span>Champs obligatoires !</p>
        </br>
        <p class="pform">
            <button class="submit" id="go">Envoyer</button>
            <button class="reset" type="reset" id="gfy">Reset</button>
        </p>
        <?php
        if ($demande == 1) {
            if ($userdao->pseudoExist($login)) {
                echo "Le pseudo est déjà existant. Veuillez en choisir un autre.";
            } else if ($userdao->mailExist($mail)) {
                echo "Le mail est déjà existant. Vérifiez bien que vous n'avez pas déjà de compte sur notre site web.";
            }
        }
        ?>
    </form>

    <div id="titre"></div>

    <?php
    include('v_footer.php');
    ?>
