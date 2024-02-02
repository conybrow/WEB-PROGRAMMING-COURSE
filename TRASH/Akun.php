<?php
require 'DbConnection.php';
class Akun{
    private $uname;
    private $pwd;
    private $fullname;
    private $negara;
    private $role;
    private $database;

    public function __construct($uname,$pwd,$fullname,$negara,$role){
        
        $this->uname=$uname;
        var_dump($this->uname);
        $this->pwd=$pwd;
        var_dump($this->pwd);
        $this->fullname=$fullname;
        var_dump($this->fullname);
        $this->negara=$negara;
        var_dump($this->negara);
        $this->role=$role;
        var_dump($this->role);
        $this->database = new DbConnection();
        var_dump($this->database);
        var_dump($this->fullname);
        echo 'elia';
        echo 'kk';die;
    }

    public function save(){
        $sql = 'insert into akun(username,Password,Fullname,Negara,Role) value(?,?,?,?,?)';
        $statement = $this->database->database->prepare($sql);
        if($statement->execute([$this->uname,$this->pwd,$this->fullname,$this->negara,$this->role])){
            echo 'berhasil';
        }
        else{
            echo 'gagal';
        }
    }

}
?>