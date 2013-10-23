<?php
class Post {
	private $id, $id_auteur, $id_postParent, $message;

	public function getId(){
		return $this->id;
	}
	public function getId_auteur(){
		return $this->id_auteur;
	}
	public function getId_postParent(){
		return $this->id_postParent;
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
	public function setMessage($unMessage){
		$this->message= $unMessage;
	}
	




}

?>