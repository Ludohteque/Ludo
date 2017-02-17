<?php

class Jeu {

        private $table = "jeu";
        private $clePrimaire = "id_jeu";
	private $idJeu;
	private $nomJeu;
	private $nbJoueurs;
	private $idAge;
	private $note;
	private $idCat;
	private $descriptif;
	private $estValide;


	public function __construct($nomJeu,$nbJoueurs,$idAge,$idCat,$descriptif) {
                $req = "INSERT INTO ".$this->table." values('',".$nomJeu.",".$nbJoueurs.",".$idAge.",'',".$idCat.",".$descriptif.");";
                PdoLudo::$monPdo->exec($req);
	}

	

}

?>