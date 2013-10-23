<?php 
class Idees{
    private $id, $idAuteur, $message, $idPostParent;
    
    public function getAll(){
        $result = $db->query("select * from post");
        $result->setFetchMode(PDO::FETCH_OBJ);
        return  $result;
    }
    
    
    
}