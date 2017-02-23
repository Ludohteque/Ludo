<?php

class MessageDAO extends DAO {
    private $table = "message";
    private $clePrimaire = "id_message";
        
    protected function create($obj) {
            $req = "insert into ".$this->table." (message) values(".$obj->getMessage().");";
	PdoLudo::$monPdo->query($req);
    }

    protected function delete($obj) {
        
    }

    protected function find($obj) {
        
    }

    protected function update($obj) {
        
    }

}
?>