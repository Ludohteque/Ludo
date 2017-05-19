<?php

abstract class DAO {
    
    abstract public function create($obj);
    
    abstract public function find($id);
    
    abstract public function delete($obj);
    
    abstract public function update($obj);
    
}

