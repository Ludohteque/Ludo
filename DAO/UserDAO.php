<?php


class UserDAO extends DAO {
	
    private static $table="user";
    private static $id="id_user";
    //verifuser(ifexist) et connect user
    
    
    public function create($obj) {
        
    	$pseudo=$obj->getPseudo();
    	$ville=$obj->getVille();
    	$mail=$obj->getMail();
    	$tel=$obj->getTel();
    	$mdp=$obj->getMdp();
    	
    	
    	$stmt = Connexion::prepare("INSERT INTO ".UserDAO::$table." (pseudo, ville, adr_mail, tel, mdp) "
                . "VALUES (?, ?, ?, ?, ?)");
    	
    	$stmt->bindParam(1, $pseudo);
    	$stmt->bindParam(2, $ville);
    	$stmt->bindParam(3, $mail);
    	$stmt->bindParam(4, $tel);
    	$stmt->bindParam(5, $mdp);
    	
    	$stmt->execute();
    }

    public function delete($obj) {
        $idCourant=$obj->getId();
    	$stmt = Connexion::prepare("DELETE FROM ".UserDAO::$table." WHERE ".UserDAO::$id." = ".$idCourant.";");
        $stmt->execute();
    }

    public function find($id) {
        $stmt = Connexion::prepare("SELECT * FROM ".UserDAO::$table." WHERE ".UserDAO::$id." = ".$id.";");
        $stmt->execute();
        $d = $stmt->fetch();
        $user=new user($d["id_user"], $d["pseudo"], $d["ville"], $d["adr_mail"], $d["tel"], $d["is_admin"], $d["is_bureau"],
                $d["mdp"], $d["note_user"], $d["nbBan"], $d["enBan"]);
            
        return $user;
   
    }
    
    public function findParPseudo($pseudo) {
        $stmt = Connexion::prepare("SELECT * FROM ".UserDAO::$table." WHERE pseudo = ".$pseudo.";");
        $stmt->execute();
        $d = $stmt->fetch();
        $user=new User($d["id_user"], $d["pseudo"], $d["ville"], $d["adr_mail"], $d["tel"], $d["is_admin"], $d["is_bureau"],
                $d["mdp"], $d["note_user"], $d["nbBan"], $d["enBan"]);
            
        return $user->getPseudo();
    }
    
    public function update($obj) {
        
        $stmt = Connexion::prepare("UPDATE ".UserDAO::$table." SET pseudo='?', ville='?', adr_mail='?', tel='?',"
                . "is_admin='?', is_bureau='?', mdp='?', note_user='?', nbBan='?', enBan='?'  WHERE id='?' ; ");
        
        $stmt->bindParam(1, $obj->getPseudo());
        $stmt->bindParam(2, $obj->getVille());
        $stmt->bindParam(3, $obj->getMail());
        $stmt->bindParam(4, $obj->getTel());
        $stmt->bindParam(5, $obj->IsAdmin());
        $stmt->bindParam(6, $obj->isBureau());
        $stmt->bindParam(7, $obj->getMdp());
        $stmt->bindParam(8, $obj->getNoteUser());
        $stmt->bindParam(9, $obj->getNbBan());
        $stmt->bindParam(10, $obj->getEnBan());
        $stmt->bindParam(11, $obj->getId_user());
        
        $stmt->execute(); 
        
    } 
    public function pseudoExist($pseudo){
        $succes=false;
        
        $pseudoAComparer=self::findParPseudo($pseudo);
        if($pseudoAComparer!==null){
            $succes=true;
        }
        return $succes;
    }
    public function mailExist($obj){
        $succes=false;
        
        $mailCourant=$obj->getMail();
        
        $objAComparer=self::find($mailCourant);
        $mailAComparer=$objAComparer->getMail();
        
        if($mailCourant==$mailAComparer){
            $succes=true;
        }
        return $succes;
    }
    public function connect($idUser, $pseudo, $mdp){
        $_SESSION['id_user']=$idUser;
        $_SESSION['user']=$pseudo;
        $_SESSION['mdp']=$mdp;
    }
    
    public function deconnect(){
        $_SESSION=array();
        session_destroy();
    }
    
}
