<?php
    class Model{
        protected static $table;
        protected $values;

        public function setId($id){
        	$this->values['ID_'.static::$table] = $id;
        }
        
        public function getId(){
        	return $this->values['ID_'.static::$table];
        }
        
        public function __construct($infos){
        	if(is_array($infos) AND count($infos)>0){
        		$this->values = $infos;
        	}
        	else if(is_numeric($infos)){
        		$this->values = array();
        		$this->setId($infos);
        		$this->read();
        	}
        }
        
        public static function esc($obj){
            return nl2br(htmlspecialchars(addslashes($obj)));
            //htmlentities($_POST['hDeb'], ENT_QUOTES,"UTF-8");
        }
        
        public function read($fields=null){
            if($fields == null){ $fields = "*"; }
            $sql = "SELECT $fields FROM ".static::$table.' WHERE ID_'.static::$table.' = '.$this->values['ID_'.static::$table];
            $res = self::db()->query($sql);
            $res2 = $res->fetch(PDO::FETCH_ASSOC);
            if($res->rowCount() > 0){
            	foreach($res2 as $key=>$value){
            	    if($key != 'ID_'.static::$table){
             	       $this->values[$key] = $value;
             	   }
           	 	}
            }
      	}    
        
        public function update(){
        	$sql= 'UPDATE '.static::$table.' SET ';
        	$attributs = $this->values;
        	foreach($attributs as $key=>$value){
        		if($key != 'ID_'.static::$table){
        			$value = self::esc($value);
        			$sql .= "$key='$value',";
        		}
        	}
        	$sql = substr($sql, 0, -1);
        	$sql .= 'WHERE ID_'.static::$table.'='.$this->getId();
        	self::db()->query($sql);
        }
        
        public static function createNew($array){
        	$sql = 'INSERT INTO '.static::$table.'(';
        	foreach($array as $key=>$value){
        		$sql .= "$key,";
        	}
        	$sql = substr($sql, 0, -1);
        	$sql .= ') VALUES(';
        	foreach($array as $value){
        		$value = self::esc($value);
        		$sql .= "'$value',";
        	}
        	$sql = substr($sql, 0, -1);
        	$sql .= ')';
        	self::db()->query($sql);
        	$id = self::db()->lastInsertId();
        	return $id;
        }
        
        public function delete(){
        	$sql = "DELETE FROM ".static::$table." WHERE ID_".static::$table." = ".$this->getId();
        	self::db()->query($sql); //Ligne indispensable, contre toute attente, pour que la requête s'exécute. Merde. Je m'excuse mais merde.
        }
        
        public static function find($data=array()){
            $conditions = '1 = 1';
            $fields = '*';
            $limit = '';
            $order = '';
            if(isset($data['conditions'])){ $conditions = $data['conditions']; }
            if(isset($data['fields'])){ $fields = $data['fields']; }
            if(isset($data['limit'])){ $limit = 'LIMIT '.$data['limit']; }
            if(isset($data['order'])){ $order = 'ORDER BY '.$data['order']; }
            $sql = "SELECT $fields FROM ".static::$table." WHERE $conditions $order $limit";
            $res = self::db()->query($sql);
            $result = array();
            while($res2 = $res->fetch(PDO::FETCH_ASSOC)){
                $result[] = new static($res2);
            }
            return $result;
        }
        
        public static function joinFind($data=array()){
        	if(isset($data['jointures'])){
				$conditions = '1 = 1';
        		$fields = '*';
        		$limit = '';
        		$order = '';
        		if(isset($data['conditions'])){ $conditions = $data['conditions']; }
        		if(isset($data['fields'])){ $fields = $data['fields']; }
        		if(isset($data['limit'])){ $limit = 'LIMIT '.$data['limit']; }
        		if(isset($data['order'])){ $order = 'ORDER BY '.$data['order']; }
        		$sql = "SELECT $fields FROM ".static::$table;
        		foreach($data['jointures'] as $jointure){
        			if(!isset($jointure['typeJointure']))
        				$sql .= ' INNER JOIN '.$jointure['table'].' ON '.$jointure['critere'].' ';
        			else 
        				$sql .= ' '.$jointure['typeJointure'].' '.$jointure['table'].' ON '.$jointure['critere'].' ';
        		}
        		$sql .= "WHERE $conditions $order $limit";
        		$res = self::db()->query($sql);
        		$result = array();
        		while($res2 = $res->fetch(PDO::FETCH_ASSOC)){
        			$result[] = new static($res2);
        		}
        		return $result;
        	}
        }
        
        protected static function db(){
            require_once('classes/PDODatabase.php');
            return PDODatabase::getInstance();
        }
		
    }
?>