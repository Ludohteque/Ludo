<?php

class MessageDAO extends DAO {
    private $table = "message";
    private $clePrimaire = "id_message";
        
    protected function create($obj) {
            $req = "insert into ".$this->table." (message) values(".$obj->getMessage().");";
	PdoLudo::$monPdo->execute($req);
    }

    protected function delete($obj) {
        $req = "delete from ".$this->table." where ".$this->clePrimaire." = ".$obj->getMessage().";";
        PdoLudo::$monPdo->execute($req);        
    }

    protected function find($obj) {
        $req = "select * from ".$this->table." where ".$this->clePrimaire." = ".$obj->getMessage().";";
        PdoLudo::$monPdo->execute($req);         
    }

    protected function update($obj) {
        $req = "update from ".$this->table." where ".$this->clePrimaire." = ".$obj->getMessage().";";
        PdoLudo::$monPdo->execute($req);         
    }
    

}
?>