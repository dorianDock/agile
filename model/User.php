<?php
require_once 'Model.php';
class User extends Model{
	private $id, $mail, $mdp, $nom, $prenom, $isAdmin, $isResponsable;
	protected static $table = 'User';
	
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
	public function getIsResponsable(){
		return $this->isResponsable;
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
	public function setIsResponsable($isResponsable){
		$this->isResponsable = $isResponsable;
	}

	public function hydraterSession(){
		$this->setId($_SESSION['id']);
		$this->setNom($_SESSION['Nom']);
		$this->setPrenom($_SESSION['Prenom']);

	}

	// Indiquer si oui ou non on soutient une idée
	public function voter($postId, $soutien){
		$req = $this->db()->prepare('
				INSERT INTO Vote VALUES (\'\','.$this->id.','.$postId.','.$soutien.');
			');
		$req->execute();

	}

	public function connexion($post){
		// On regarde si l'utilisateur en question existe.
		// Si oui, l'index pourra prendre les bonnes décisions
		$req = $this->db()->prepare("
				SELECT * FROM user WHERE mail = ".$post['email']." AND mdp = ".$post['password']
			);
		$req->execute();
		$res=$req->fetch();
		if(count($res)>0){
			return true;
		}
		else {
			return false;
		}
	}

	public function inscrire($post){
		// On ajoute l'utilisateur en base
		$req = $this->db()->prepare("
				INSERT INTO user VALUES ('', '".$post['mail']."','".$post['mdp']."','".$post['nom']."','".$post['prenom']."',
					'".$post['isAdmin']."','".$post['isResponsable']."')
			");
		$req->execute();
		// On récupère maintenant le dernier id inséré
		$lastId=$this->db()->lastInsertId();
		$_SESSION['id']=$lastId;
		$_SESSION['nom']=$post['nom'];
		$_SESSION['prenom']=$post['prenom'];
		$_SESSION['isAdmin']=$post['isAdmin'];
		$_SESSION['isResponsable']=$post['isResponsable'];


		
	}


}

?>
