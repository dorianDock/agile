<?php

class PDODatabase{
    
    protected static $instance = NULL;
    
    const CONNECTION_TYPE = 'mysql';
    //const CONNECTION_TYPE = 'pgsql';
    
    const DEFAULT_SQL_USER = 'u769120773_agile';
    
    const DEFAULT_SQL_HOST = 'localhost';
    
    const DEFAULT_SQL_PASS = 'isic_2014';
        
    const DEFAULT_SQL_DTB = 'u769120773_agile';
	
	/*const DEFAULT_SQL_USER = 'root';
    
    const DEFAULT_SQL_HOST = 'localhost';
    
    const DEFAULT_SQL_PASS = '';
        
    const DEFAULT_SQL_DTB = 'agile';*/

    public static function getInstance() {
        if (is_null(self::$instance)) {            
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            self::$instance = new PDO(self::CONNECTION_TYPE.":host=".self::DEFAULT_SQL_HOST.";dbname=".self::DEFAULT_SQL_DTB, self::DEFAULT_SQL_USER, self::DEFAULT_SQL_PASS, $pdo_options);
            self::$instance->exec('SET NAMES utf8');
        }
        return self::$instance;
    }
    
    private function __construct(){}
	
}
?>