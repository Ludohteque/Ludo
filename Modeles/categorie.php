<? php 
public class categorie {
    private $idcat = "id_categorie";
    private $nomcat = "nom_categorie";
    private $table = "categories";
    
    function __construct ($idcatenv, $nomcatenv) {
        $this->idcat = $idcatenv;
        $this->nomcat = $nomcatenv;
    }
    
    function lireCatNom ($idcatenv) {
        $requete = "SELECT ".$nomcat." FROM ".$table." WHERE ".$idcat." LIKE ".$idcatenv.";"

    }
    
    function lireCatId ($nomcatenv) {
        $requete = "SELECT ".$idcat." FROM ".$table." WHERE ".$nomcat." LIKE ".$nomcatenv.";"

    }
}
?>