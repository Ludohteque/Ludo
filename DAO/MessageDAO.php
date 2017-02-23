<?php

class MessageDAO extends DAO {
    private $table = "message";
    private $clePrimaire = "id_message";
        
    protected function create($obj) {
        try {
            $req -> "insert into".$this->table." (message) values(?)";
            PreparedStatement pst = Connexion.getInstance().prepareStatement(requete);
            pst.setString(2,obj.getMessage());
            pst.executeUpdate();
            
            obj.setNumAv(Connexion.getMaxId(CLE_PRIMAIRE, TABLE));
            
        } catch (SQLException e) {
            succes=false;
            e.printStackTrace();
            
        }
        return succes;
		
	}
        
    }

    protected function delete($obj) {
        
    }

    protected function find($obj) {
        
    }

    protected function update($obj) {
        
    }

}
