<?php
require '../class/dbCon.php';
$srn = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=UTF8";
$pdo = new PDO($srn,DB_USER,DB_PWD);
$calldb=new DbCon();

class Akun{
    private $id;
    private $fullname;
    private $idRole;
    private $email;
    private $negara;
    private $password;
    private $uname;
    private $status;
    private $calldb;

    public function __construct($nmpj=null,
    $role=null,$email=null,$ngr=null,$pw=null,$unm=null,$status="AKTIF"){

        if($nmpj!=null && $role!=null && $email!=null && $ngr!=null && $pw!=null && $unm!=null){
            $this->fullname=$nmpj;
            $this->idRole=$role;
            $this->email=$email;
            $this->negara=$ngr;
            $this->password=$pw;
            $this->uname=$uname;
        }
        $this->calldb = new DbCon();
    }

    function db(){
        $srn = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=UTF8";
        $pdo = new PDO($srn,DB_USER,DB_PWD);
        return($pdo);
    }

    public function go($query){
        $pdo = $this->db();
        $statement = $pdo->prepare($query);
        return($statement);
    }

    public function bP($Mark,$fill,$jenis){
        if($jenis==1){
            return bindPAram($Mark,$fill,PDO::PARAM_INT);}
        else if($jenis==2){
            return bindPAram($Mark,$fill,PDO::PARAM_STR);
        }
        else{ return bindPAram($Mark,$fill);}
    }

    public function save(){
        $sql = "insert into akun (fullName, idRole, email, negara, password, username) values (?,?,?,?,?,?)";
        $insert = $this->go($sql);
        return($insert->execute([$this->fullname,$this->idRole,$this->email,$this->negara,$this->password,$this->uname]));
    }

    public function showAll(){
        $query = 'Select * from uang';
        $insert = $this->go($query);
        $data = $insert->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function hapus($id){
        $query = 'delete from akun where id = :id';
        $proses =  $this->go($query);
        $proses->$this->bP(':id',$id,1);
        return $proses->execute();
    }



    public function showById($id){
        $i = 'select * from akun where id = :id';
        $go = $this->go($i);
        $go->$this->bP(':id',$id,1);
        $go->execute();
        $data = $go->fetch();
        return $data;
    }

    // public function ubah1($atribut, $data, $id){
    //     if($atribut=='name'){$sql = 'update akun set fullName =:a where id=:id';}
    //     if($atribut=='role'){$sql = 'update akun set idRole =:a where id=:id';}
    //     if($atribut=='email'){$sql = 'update akun set email =:a where id=:id';}
    //     if($atribut=='negara'){$sql = 'update akun set negara =:a where id=:id';}
    //     if($atribut=='pw'){$sql = 'update aku   n set password =:a where id=:id';}
    //     if($atribut=='uname'){$sql = 'update akun set username =:a where id=:id';}
    //     if($atribut=='status'){$sql = 'update akun set status =:a where id=:id';}

    //     $go = $this->go($sql);
    //     $go->$this->bP('=:id',$id,1);
    //     $go->$this->bP('=:=a',$data,0);

    //     return $go->execute();
    // }
}

$a = new Akun();
$aa = $a->showById(2);
var_dump($aa);
?>