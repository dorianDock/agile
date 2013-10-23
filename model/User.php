<?php
class User {
	private $id, $mail, $mdp, $nom, $prenom, $isAdmin;

	public function getMail(){
		return $this->mail;
	}
	public function getMdp(){
		return $this->mdp;
	}

	public function getId(){
		return $this->mail;
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

	public function setId($id){
		$this->id= $id;
	}
	public function setPrenom($unPrenom){
		$this->prenom= $unPrenom;
	}
	public function setIsAdmin($isAdmin){
		$this->isAdmin= $isAdmin;
	}

	public function hydraterSession(){
		$this->setId($_SESSION['id']);
		$this->setNom($_SESSION['Nom']);
		$this->setPrenom($_SESSION['Prenom']);

	}

	// Indiquer si oui ou non on soutient une idée
	public function voter($postId, $soutien){
		$this->db->prepare('
				INSERT INTO Vote VALUES (\'\','.$this->id.','.$postId.','.$soutien.');
			');
		$this->db->execute();

	}

	// Indiquer si oui ou non on soutient une idée
	public function ecrire($titre, $message){
		
	
	}


}

?>