/* 
 code javascript utilisable de toutes les pages
 */

function verifMailIdent()
{
var champA = document.getElementById("mail").value;
var champB = document.getElementById("mail2").value;
 
if(champA === champB)
    {
        surligne(mail, true);
        surligne(mail2, true);
        return true;
    }
    else
    {
        surligne(mail, false);
        surligne(mail2, false);  
        alert("Les deux adresse mail entrées ne sont pas identiques !!!");
        return false;
    }
}

function surligne(champ, erreur)
{
   if(erreur)
   {
      champ.style.borderColor = "#fba";}
   else
   {
      champ.style.borderColor = "green";}
}

function verifPseudo(champ)
{
   if(champ.value.length < 2 || champ.value.length > 25)
   {
      surligne(champ, true);
      return false;
   }
   else
   {
      surligne(champ, false);
      return true;
   }
}
function isEmail(champ){
     // La 1ère étape consiste à définir l'expression régulière d'une adresse email
     var regEmail = new RegExp('^[0-9a-z._-]+@{1}[0-9a-z.-]{2,}[.]{1}[a-z]{2,5}$','i');
     if (regEmail.test(champ.value)) surligne(champ, false);
     else surligne(champ, true);
     return regEmail.test(champ.value);
   }




function verifForm(f)
{
   var pseudoOk = verifPseudo(f.pseudo);
   var mdpIdent = verifmdps();
   //var mailOk = isEmail(f.email);
   var mailIdent = verifMailIdent();
   var telOk = verifTel(f.phone);
   
   alert(pseudoOk+mdpIdent+mailIdent+telOk);
   if(mailIdent && mdpIdent && pseudoOk)
   {alert('tout est ok');
       return true;}
   else
   {
      alert("Veuillez remplir correctement tous les champs");
      return false;
   }
}

function verifmdps()
{
var champA = document.getElementById("passe").value;
var champB = document.getElementById("passe2").value;
 
if(champA === champB)
    {
        //surligne(champA, false);
        //surligne(champB, false);
        return true;
    }
    else
    {
        //surligne(champA, true);
        //surligne(champB, true);        
        alert("Les deux mots de passe entrés ne sont pas identiques !!!");
        return false;
    }
}

function verifTel(champ){
    if (champ.length < 10 || champ.length > 12 || isNaN(champ.value)) {
        return false;
    }
    else
    {
        return true;
    }
}




