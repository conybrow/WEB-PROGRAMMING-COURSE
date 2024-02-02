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
    $role=null,$email=null,$ngr=null,$pw=null,$unm=null,$status='AKTIF'){

        if($nmpj!=null && $role!=null && $email!=null && $ngr!=null && $pw!=null && $unm!=null){
            $this->fullname=$nmpj;
            $this->idRole=$role;
            $this->email=$email;
            $this->negara=$ngr;
            $this->password=$pw;
            $this->uname=$unm;
            $this->id = $this->makeid();
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

    public function showById($id){
        $i = 'select * from akun where id = :id';
        $go = $this->go($i);
        $go->bindParam(':id',$id,PDO::PARAM_INT);
        $go->execute();
        $data = $go->fetchAll(PDO::FETCH_ASSOC|PDO::FETCH_UNIQUE);
        return $data;
    }

    public function getId($atributNotId,$data){
        $i = 'select * from akun where '.$atributNotId.' = "'.$data.'"';
        // echo $i;
        $go = $this->go($i);
        $go->execute();
        $data = $go->fetchAll(PDO::FETCH_ASSOC|PDO::FETCH_UNIQUE);
        // var_dump($data);
        return $data;
    }

    public function showByatribut($id,$atribut){
        $i = 'select * from akun where '.$atribut.' =:id';
        // echo $i;
        $go = $this->go($i);
        // echo $go;
        if(is_numeric($id)){
            $go->bindParam(':id',$id,PDO::PARAM_INT);
        }
        else{
            $go->bindParam(':id',$id,PDO::PARAM_STR);
        }
        $go->execute();
        $data = $go->fetchAll(PDO::FETCH_ASSOC|PDO::FETCH_UNIQUE);
        return $data;
    }

    public function save(){
        $sql = "insert into akun (id,fullName, idRole, email, negara, password, username) values (?,?,?,?,?,?,?)";
        $insert = $this->go($sql);
        return($insert->execute([$this->id,$this->fullname,$this->idRole,$this->email,$this->negara,$this->password,$this->uname]));
    }

    public function showAll(){
        $query = 'Select * from akun';
        $insert = $this->go($query);
        $insert->execute();
        $data = $insert->fetchAll(PDO::FETCH_ASSOC|PDO::FETCH_UNIQUE);
        return $data;
    }

    public function hapus($id){
        $query = 'delete from akun where id = :id';
        $proses =  $this->go($query);
        $proses->$this->bP(':id',$id,1);
        return $proses->execute();
    }
    function getData($find,$array){
        //untuk perulngan mengambil data dari sebuah array
        $back=null;
        foreach ($array as $data) {
            foreach ($data as $value) {
                $sv = $value;
                if($sv==$find){
                    $back = $sv;
                }
            }
        }
        return $back;
    }

    
    public function getDataByKey($array,$atribut){
        //untuk perulngan mengambil data dari sebuah array
        $back=null;
        foreach ($array as $data) {
            foreach ($data as $value) {
                $sv = $value;
                if($sv==$find){
                    $back = $sv;
                }
            }
        }
        return $back;
    }

    public function makeid(){
        $query = 'select * from akun ORDER by id desc limit 1';
        $go = $this->go($query);
        $go->execute();
        $data = $go->fetchAll(PDO::FETCH_ASSOC|PDO::FETCH_UNIQUE);
        var_dump($data);
        $keys =array_keys($data);
        $id = $keys[0]+1;
        return $id;
    }

}
// $a=new Akun();
// $getid = $a->getId('username','kjh');
// var_dump($getid);
// echo'========================================';
// $keys = array_keys($getid);
// echo $keys[0];
// echo '                                         =========================================';

// // $b = $a->showById(2);
// var_dump($b);
// $unm = $b[2]['username'];
// echo 'unm : '.$unm;





