<?php
require '../class/dbCon.php';
$srn = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=UTF8";
$pdo = new PDO($srn,DB_USER,DB_PWD);
$calldb=new DbCon();


function db(){
        $srn = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=UTF8";
        $pdo = new PDO($srn,DB_USER,DB_PWD);
        return($pdo);
}
function go($query){
    $pdo = db();
    $statement = $pdo->prepare($query);
    return($statement);
}

function readDb($ename,$purpose,$atribut,$table){
    $pdo = db();
    $query = 'select '.$atribut.' from '.$table.' ';
    // echo $query;
    $proses = go($query);
    // $proses->$pdo->bindParam(':id',$ename,PDO::PARAM_INT);
    $proses->execute();
    $datas = $proses->fetchAll(PDO::FETCH_ASSOC);
    getData($ename,$datas);
    $back = getData($ename,$datas);
    if($purpose=='cek'){
        if($back!=0){
            $back = 1;
            return $back;
        }
    }
    
    return $back;
}

function readWhere($kondisi,$atribut,$table){
    //untuk select * from table where atribut = kondisi
    $pdo = db();
    $query = 'select * from '.$table.' where '.$atribut.'=:kondisi';
    // echo $query;
    $proses = go($query);
    $proses->bindParam(':kondisi',$kondisi,PDO::PARAM_STR);
    // echo $proses;
    $proses->execute();
    $datas = $proses->fetchAll(PDO::FETCH_ASSOC|PDO::FETCH_UNIQUE);
    return $datas;
}

function getData($find,$array){
    //untuk perulngan mengambil data dari sebuah array
    $back=0;
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


function chekExist($key){
    $tes=0;
    $tes=readDb($key,'cek','email','akun');
    if($tes!=0){return $tes;};
    $tes=readDb($key,'cek','username','akun');
    if($tes!=0){return $tes;};
    return $tes;
}

function getBy($array,$atribut){
    $back = null;
    foreach ($array as $data) {
        foreach ($data as $key => $value) {
            if($key==$atribut){
                $back = $value;
            }
        }
        // echo $back;
    }
}

