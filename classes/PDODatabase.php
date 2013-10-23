<?php

class PDODatabase{
    
    protected static $instance = NULL;
    
    const CONNECTION_TYPE = 'mysql';
    //const CONNECTION_TYPE = 'pgsql';
    
<<<<<<< HEAD
<<<<<<< HEAD
    const DEFAULT_SQL_USER = 'u769120773';
    
    const DEFAULT_SQL_HOST = '31.170.164.30';
    
    const DEFAULT_SQL_PASS = 'isic_2014';
        
    const DEFAULT_SQL_DTB = 'agile';
=======
    const DEFAULT_SQL_USER = 'mohamed.khalloqi@minesdedouai.fr';
=======
    const DEFAULT_SQL_USER = 'u769120773_agile';
>>>>>>> 7e081fbd4a23316cd2eeff9c2226687c1caedd44
    
    const DEFAULT_SQL_HOST = 'localhost';
    
    const DEFAULT_SQL_PASS = 'isic_2014';
    
    const DEFAULT_SQL_DTB = 'u769120773_agile';
>>>>>>> b54a68b35b1062fd657cd592bdeee75b09a9d9cf

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