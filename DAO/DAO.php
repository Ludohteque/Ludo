<?php

abstract class DAO {
    
    abstract protected function create($obj);
    
    abstract protected function find($obj);
    
    abstract protected function delete($obj);
    
    abstract protected function update($obj);
    
    
}


?>