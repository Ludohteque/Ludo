<?php

class CommentaireDAO extends DAO{
    
    private $table = "commentaire";
    private $clePrimaire = "id_comm";
    
    protected function create($obj) {
        
    	$commentaire=$obj->getCommentaire();
    	$id_jeu=$obj->getIdJeu();
    	$id_user=$obj->getIdUser();    	
    	
    	$stmt = Connexion::getInstance()->prepare("INSERT INTO ".$this->table." (commentaire, id_jeu, id_user) "
                . "VALUES (?, ?, ?)");
    	
    	$stmt->bindParam(1, $commentaire);
    	$stmt->bindParam(2, $id_jeu);
    	$stmt->bindParam(3, $id_user);
    	
    	$stmt->execute();
    }

    protected function delete($obj) {
        $id_comm=$obj->getIdJeu();
    	
    	$stmt = Connexion::getInstance()->prepare("DELETE FROM ".$this->table." WHERE ".$this->clePrimaire." = ".$id_comm.";");
        $stmt->execute();
    }

    protected function find($id) {
        $stmt = Connexion::getInstance()->prepare("SELECT * FROM ".$this->table." WHERE ".$this->id." = ".$id_comm.";");
        $stmt->execute();
        $d = $stmt->fetch();
        $user=new user($d["id_comm"], $d["commentaire"], $d["id_jeu"], $d["id_user"]);
            
        return $user;
   
    }
  
    protected function update($obj) {
        
        $stmt = Connexion::getInstance()->prepare("UPDATE ".$this->table." SET commentaire='?', id_jeu='?', id_user='?'  WHERE id='?'; ");
        
        $stmt->bindParam(1, $obj->getCommentaire());
        $stmt->bindParam(2, $obj->$id_jeu());
        $stmt->bindParam(3, $obj->$id_user());
        
        $stmt->execute(); 
        
    } 
}
   ?>