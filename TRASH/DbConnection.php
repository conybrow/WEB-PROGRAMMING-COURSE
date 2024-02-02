<?php
require 'config.php';
class DbConnection{
    public $database;
    public function __construct(){
        $dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=UTF8";
        try{
            $pdo = new PDO($dsn,DB_USER,DB_PWD);
            if($pdo){
                $this->database = $pdo;
            }
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }

}
?>