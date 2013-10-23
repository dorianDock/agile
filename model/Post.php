<?php
require_once './Model/Model.php';
class Post extends Model {
    
        private $id, $idAuteur, $message, $idPostParent;
    
    public function getAll(){
        $result = $db->query("select * from post");
        $result->setFetchMode(PDO::FETCH_OBJ);
        return  $result;
    }
    
    
    
    
    
	/*private $id, $id_auteur, $id_postParent, $titre, $message;

	public function getId(){
		return $this->id;
	}
	public function getId_auteur(){
		return $this->id_auteur;
	}
	public function getId_postParent(){
		return $this->id_postParent;
	}
	public function getTitre(){
		return $this->titre;
	}
	public function getMessage(){
		return $this->message;
	}
	

	public function setId($unId){
		$this->id= $unId;
	}
	public function setId_auteur($id_Auteur){
		$this->id_Auteur= $id_Auteur;
	}
	public function setId_postParent($id_postParent){
		$this->id_postParent= $id_postParent;
	}
	public function setTitre($unTitre){
		$this->titre= $unTitre;
	}
	public function setMessage($unMessage){
		$this->message= $unMessage;
	}
	

*/


}

?>