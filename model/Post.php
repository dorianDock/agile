<?php
class Post extends Model {
    	protected static $table = 'post';
        private $titre, $id, $idAuteur, $message, $idPostParent;  
    

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
	
	public function getPost($idPost){
		//var_dump($idPost);die();
		$data = array('conditions'=> 'id=1');
		$result = $this->find($data);
		var_dump($result);die();
		
	}
}

?>