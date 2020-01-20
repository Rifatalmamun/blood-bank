<?php 

class Database{

    private $databaseHost = 'localhost';
    private $databaseName = 'just_blood_bank';
    private $databaseUser = 'root';
    private $databasePassword = '';
    public $pdo; 

    
    public function __construct(){
        if(!isset($this->pdo)){
            try{
                $link=new pdo("mysql:host=".$this->databaseHost.";dbname=".$this->databaseName,$this->databaseUser,$this->databasePassword);
				$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $link->exec("SET CHARACTER SET UTF8");
                $this->pdo = $link;

            }catch(PDOException $e){
                die('Failed to connect with database'.$e->getMessage());  
            }
        }
    }
}


?>