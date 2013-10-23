<?php
class Vote extends Model{
	private $id, $idAuteur, $idPost, $value;
	public static $table = "Vote";
	
	public function getId(){
		return $this->id;
	}
	public function getIdAuteur(){
		return $this->idAuteur;
	}
	public function getIdPost(){
		return $this->idPost;
	}
	public function getValue(){
		return $this->value;
	}
	

	public function setId($unId){
		$this->id = $unId;
	}
	public function setIdAuteur($unIdAuteur){
		$this->idAuteur = $unIdAuteur;
	}
	public function setIdPost($unIdPost){
		$this->idPost = $unIdPost;
	}
	public function setValue($uneValue){
		$this->value = $uneValue;
	}
}

?>