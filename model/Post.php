<?php
class Post extends Model {
    	protected static $table = 'post';
        private $titre, $id, $idAuteur, $message, $idPostParent;
        protected $values;
    
    public static function getAll(){
        $result = $db->query("select * from post");
            $res = $db->query("select * from post");
            $result = array();
            while($res2 = $res->fetch(PDO::FETCH_ASSOC)){
                $result[] = new static($res2);
            }
    }
    
    public function getValues(){
        return $this->values;
    }
    
    
    
    
    
	// private $id, $id_auteur, $id_postParent, $titre, $message;

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