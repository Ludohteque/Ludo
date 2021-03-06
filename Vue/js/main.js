/* 
 code javascript utilisable de toutes les pages
 */

function verifMailIdent()
{
    var champA = document.getElementById("mail").value;
    var champB = document.getElementById("mail2").value;

    if (champA === champB)
    {
        surligne(mail, false);
        surligne(mail2, false);
        return true;
    } else
    {
        surligne(mail, true);
        surligne(mail2, true);
        alert("Les deux adresse mail entrées ne sont pas identiques !!!");
        return false;
    }
}

function surligne(champ, erreur)
{
    if (erreur)
    {
        champ.style.borderColor = "#fba";
    } else
    {
        champ.style.borderColor = "green";
    }
}

function verifPseudo(champ)
{
    if (champ.value.length < 2 || champ.value.length > 25)
    {
        surligne(champ, true);
        return false;
    } else
    {
        surligne(champ, false);
        return true;
    }
}
function isEmail(champ) {
    // La 1ère étape consiste à définir l'expression régulière d'une adresse email
    var regEmail = new RegExp('^[0-9a-z._-]+@{1}[0-9a-z.-]{2,}[.]{1}[a-z]{2,5}$', 'i');
    if (regEmail.test(champ.value))
        surligne(champ, false);

    else {
        surligne(champ, true);
        alert('Ceci n\'est pas une adresse mail valide !');
    }
    return regEmail.test(champ.value);
}




function verifForm(f)
{
    var pseudoOk = verifPseudo(f.pseudo);
    var mdpIdent = verifmdps();
    //var mailOk = isEmail(f.email);
    var mailIdent = verifMailIdent();
    var telOk = verifTel(f.phone);
    var mailOK = isEmail(f.mail);
    var passeOK = verifPasse(f.passe);
//   alert(pseudoOk+mdpIdent+mailIdent+telOk);
    if (mailIdent && mdpIdent && pseudoOk && mailOK && telOk && passeOK)
    {
        return true;
    } else
    {
        alert("Veuillez remplir correctement tous les champs");
        return false;
    }
}

function verifVille(champ) {
    if (isNaN(champ.value) && champ.value.length > 2) {
        surligne(champ, false);
    } else
    {
        surligne(champ, true);
    }
}

function verifmdps()
{
    var champA = document.getElementById("passe").value;
    var champB = document.getElementById("passe2").value;

    if (champA === champB)
    {
        surligne(mail, false);
        surligne(mail2, false);
        return true;
    } else
    {
        surligne(mail, true);
        surligne(mail2, true);
        alert("Les deux mots de passe entrés ne sont pas identiques !!!");
        return false;
    }
}

function verifPasse(champ) {
    if (champ.value.length < 5)
    {
        surligne(champ, true);
        alert('Les mots de passe doivent comporter au moins 5 caractères !');
    } else {
        surligne(champ, false);
        return true;
    }
}

function verifpasse2(champ) {
    if (champ.value.length < 5)
    {
        surligne(champ, true);
    } else
        surligne(champ, false);
}

function verifTel(champ) {
    if (champ.value.length < 10 || champ.value.length > 12 || isNaN(champ.value)) {
        surligne(champ, true);
        return false;
    } else
    {
        surligne(champ, false);
        return true;
    }
}
function validation(f) {
    if (f.mdp1.value !== f.mdp2.value) {
        alert('Ce ne sont pas les mêmes mots de passe!');
        f.mdp1.focus();
        return false;
    } else if (f.mdp1.value === f.mdp2.value) {
        return true;
    } else {
        f.mdp1.focus();
        return false;
    }
}

function verifCat() {
    if ($('div.checkbox-group.required :checkbox:checked').length > 0) {
        return true;
    } else {
        alert("Vous devez cocher au moins une catégorie.");
        return false;
    }

}

$("#inscription").click(function () {
    $("body").addClass("grey");
});

$("#connexion").click(function () {
    $("body").addClass("grey");
});

$(".confirm").click(function (e) {
    e.preventDefault();
    theHREF = $(this).attr("href");
    $("#cModal").modal("show");
});

$("#Non").click(function (e) {
    $("#cModal").modal("hide");
});

$("#Yes").click(function (e) {
    window.location.href = theHREF;
});

//$(document).ready(function () { 

//    });
