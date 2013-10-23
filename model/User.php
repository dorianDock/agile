<?php
class User {
	private $mail, $mdp, $nom, $prenom, $isAdmin;

	public function getMail(){
		return $this->mail;
	}
	public function getMdp(){
		return $this->mdp;
	}
	public function getNom(){
		return $this->nom;
	}
	public function getPrenom(){
		return $this->prenom;
	}
	public function getIsAdmin(){
		return $this->isAdmin;
	}

	public function setMail($unMail){
		$this->mail= $unMail;
	}
	public function setMdp($unMdp){
		$this->mdp= $unMdp;
	}
	public function setNom($unNom){
		$this->nom= $unNom;
	}
	public function setPrenom($unPrenom){
		$this->prenom= $unPrenom;
	}
	public function setIsAdmin($isAdmin){
		$this->isAdmin= $isAdmin;
	}








}

?>