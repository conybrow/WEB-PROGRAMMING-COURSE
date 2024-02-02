<?php
require '../class/dbCon.php';
$srn = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=UTF8";
$pdo = new PDO($srn,DB_USER,DB_PWD);
$calldb=new DbCon();

class Transaksi{
    private $id;
    private $total;
    private $tanggal;
    private $idKasir;
    private $waktu;
    private $calldb;
    private $bayar;
    private $kembalian;

    public function __construct(
    $tgl=null,$idkasir=null,$waktu=null){
        // echo 'total'.$total;
        // echo 'tgl'.$tgl;
        // echo 'waktu'.$waktu;
        // echo 'param :'.$idkasir;
        // // echo 'true/false = '.($total!=null);
        if($tgl!=null && $idkasir!=null && $waktu!=null){

            $this->tanggal=$tgl;
            $this->idKasir=$idkasir;
            $this->waktu=$waktu;
            $this->id = $this->makeid();
            $this->save();
            // echo '===in work===';
        }
        // echo 'idKasir : '.$this->showidkasir();
        // echo 'total'.$this->total;
        // echo 'tgl'.$this->tanggal;
        // echo 'waktu'.$this->waktu;
        $this->calldb = new DbCon();
    }
    function db(){
        $srn = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=UTF8";
        $pdo = new PDO($srn,DB_USER,DB_PWD);
        return($pdo);
    }

    public function showidkasir (){
        if($this->idKasir!=null){
            return $this->idKasir;
        }
        else{
            return 'kosong';
        }
    }

    public function go($query){
        $pdo = $this->db();
        $statement = $pdo->prepare($query);
        return($statement);
    }

    public function save(){
        $query = 'insert into transaksi (id,tanggal,idKasir,waktu) values(?,?,?,?)';
        $insert = $this->go($query);
        // echo $this->idKasir;
        return($insert->execute([$this->id,$this->tanggal,$this->idKasir,$this->waktu]));
    }
    
    public function getId(){
        return $this->id;
    }

    public function makeid(){
        $query = 'select * from transaksi ORDER by id desc limit 1';
        $go = $this->go($query);
        $go->execute();
        $data = $go->fetchAll(PDO::FETCH_ASSOC|PDO::FETCH_UNIQUE);
        // var_dump($data);
        if(!empty($data)){
            $keys = array_keys($data);
            $id = $keys[0]+1;
        }else{
            $id = 1;
        }
        
        // return $id;
        return $id;
    }
    
    public function getTotal(){
        $query = 'select total from transaksi where id ='.$this->id;
        $go = $this->go($query);
        $go->execute();
        $data = $go->fetchAll(PDO::FETCH_ASSOC|PDO::FETCH_UNIQUE);
        // var_dump($data);
        $keys =array_keys($data);
        $total = $keys[0];
        // echo $total;
        return $total;
    }

    public function setBayar($bayar){
        $this->bayar=$bayar;

        $query = 'update transaksi set Jumlah_Bayar = '.$this->bayar.' where id = '.$this->id;
        $go = $this->go($query);
        $go->execute();
    }

    public function setKembalian($kembali){
        $this->kembalian=$kembali;

        $query = 'update transaksi set kembalian = '.$this->kembalian.' where id = '.$this->id;
        $go = $this->go($query);
        $go->execute();
    }

    public function updateBayar($bayar,$kembali){
        $this->setBayar($bayar);
        $this->setKembalian($kembali);
    }

    public function getPanjang(){
        $query = 'select count(id) from transaksi';
        $go = $this->go($query);
        $go->execute();
        $data = $go->fetchAll(PDO::FETCH_ASSOC|PDO::FETCH_UNIQUE);
        // var_dump($data);
        $keys =array_keys($data);
        $total = $keys[0];
        // echo $total;
        return $total;
    }

    

    public function showAll($idKasir){
        $query = 'select * from transaksi where idKasir = '.$idKasir;
        $go = $this->go($query);
        $go->execute();
        $data = $go->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($data);
        return ($data);
    }
    public function deleteTr($idTr){
        $query = 'delete from transaksi where id = '.$idTr;
        $go = $this->go($query);
        $go->execute();
        // $data = $go->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($data);
        // return ($data);
    }

    public function cekExistId($idTr){
        $query = 'select * from transaksi where id = '.$idTr;
        $go = $this->go($query);
        $go->execute();
        $data = $go->fetchAll(PDO::FETCH_ASSOC);
        return ($data);
    }

    public function getdataTr($idTr,$which){
        if($which==1){
            $query = 'select total from transaksi where id='.$idTr;
            $which='total';
        }
        else if($which==2){
            $query = 'select kembalian from transaksi where id='.$idTr;
            $which = 'kembalian';
        }
        else if($which==3){
            $query = 'select jumlah_bayar from transaksi where id='.$idTr;
            $which = 'jumlah_bayar';
        }
        else if($which==4){
            $query = 'select tanggal from transaksi where id='.$idTr;
            $which = 'tanggal';
        }
        else if($which==5){
            $query = 'select waktu from transaksi where id='.$idTr;
            $which = 'waktu';
        }
        $go = $this->go($query);
        $go->execute();
        $data = $go->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($data);
        return ($data[0][$which]);
    }

    public function cekJP($idTr){
        try{
            $query = 'select jenisPelayanan from detiltransaksi where idTransaksi = '.$idTr;
        $go = $this->go($query);
        $go->execute();
        $data = $go->fetchAll(PDO::FETCH_ASSOC);
        $string []=null;
        foreach ($data as $val){
            $a = $val['jenisPelayanan'];
            // echo $a."||";
            $W1 = 'Wash';
            $W2 = 'Wash And Haircut';
            $T = 'Treatment';
            $C = 'Cut';
            // echo $a.'||';
            if($a===$W1){
                array_push($string,'W1');
            }
            if($a===$W2){
                array_push($string,'W2');
            }
            if($a===$T){
                array_push($string,'T');
            }
            if($a===$C){
                array_push($string,'C');
            }
        }

        $final = implode("",$string);
        // if(strstr($data,))
        return ($final);
        }
        catch(Exception $e){
            return(0);
        }
        
    }
}
// $a = new Transaksi();
// $b=$a->getdataTr(4,5);
// echo $b;
// var_dump($b);
// echo $b;
// // var_dump($b);
// echo $b;
// $a->deleteTr(2);
// // $ary = $a->cekExistId(2);
// // $jp = $a->cekJP(8);
// // var_dump($jp);
// $jp = $a->cekJP(32);
// echo $jp;
// $a = new Transaksi(); 
// $Jp = $a->cekJP(32); 
// echo 'jp ='.$Jp.'||';






