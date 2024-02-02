<?php
require '../class/config.php';// memuat file konfigurasi
class DbCon
{
    public $db;
    public function __construct()
    {
        $dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=UTF8";
        try{
            $pdo = new PDO($dsn,DB_USER,DB_PWD);
            if($pdo){
                $this->db = $pdo;
                // echo "database telah tersambung.";
            }
        } catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    public function show($table, $atribut){
        
    
    try{
        $dbs = new DbCon();
        
        $dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=UTF8";
        $pdo = new PDO($dsn,DB_USER,DB_PWD);
        $query = 'select '.$atribut.' from '.$table;
        $result = $pdo->query($query);
        if($result){
            $data = $result->fetchAll(PDO::FETCH_ASSOC);
            var_dump($data);
        }
        else{
            echo 'gagal';
        }
    }
    catch(PDOException $e){
        echo 'eror: '. $e->getMessage();
    }
    }
}




?>