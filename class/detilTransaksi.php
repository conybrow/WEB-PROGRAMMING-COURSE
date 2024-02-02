<?php
// require '../class/dbCon.php';
$srn = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=UTF8";
$pdo = new PDO($srn,DB_USER,DB_PWD);
$calldb=new DbCon();

class DTransaksi{
    private $id;
    private $jenisPelayanan;
    private $harga;
    private $idtransaksi;

    public function __construct(
    $jenisPelayanan=null,$harga=null,$idtransaksi=null){
        if($jenisPelayanan!=null && $harga!=null  && $idtransaksi!=null){
            $this->jenisPelayanan=$jenisPelayanan;
            $this->harga=$harga;
            $this->idtransaksi=$idtransaksi;
            $this->save();
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

    public function save(){
        $query = 'insert into detiltransaksi (jenisPelayanan,harga,idTransaksi) values(?,?,?)';
        $insert = $this->go($query);
        $insert->execute([$this->jenisPelayanan,$this->harga,$this->idtransaksi]);
        $updateTransaksi = "UPDATE transaksi set total = (select sum(harga) from detiltransaksi where idTransaksi=".$this->getIdT().") WHERE id=".$this->getIdT();
        $update = $this->go($updateTransaksi);
        return($update->execute());
    }

    public function getIdT(){
        return $this->idtransaksi;
    }

    public function IsIdTExist($idtransaksi){
        $back = true;
        $query = 'select count(id) from transaksi where id='.$idtransaksi;
        $cek = $this->go($query);
        $cek->execute();
        $data = $cek->fetchAll(PDO::FETCH_ASSOC|PDO::FETCH_UNIQUE);
        // var_dump($data);
        $keys = array_keys($data);
        $id = $keys[0];
        echo 'adaaakah ===> '.$id;
        if($id===0){
            return false;
        }

    }
    public function cek(){
        $query = 'select count(id) from transaksi where id';
        $go = $this->go($query);
        $go->execute();
        $data = $go->fetchAll(PDO::FETCH_ASSOC|PDO::FETCH_UNIQUE);
        // var_dump($data);
        $keys = array_keys($data);
        $id = $keys[0];
        
    }
    public function deleteByIdTr($idTr){
        $query = 'delete from detiltransaksi where idTransaksi = '.$idTr;
        $go = $this->go($query);
        $go->execute();
    }

    public function cekExistJP($idTransaksi,$jp){
        $query = 'select * from detiltransaksi where JenisPelayanan = "'.$jp.'" and idTransaksi = '.$idTransaksi;
        $go = $this->go($query);
        $go->execute();
        $data = $go->fetchAll(PDO::FETCH_ASSOC|PDO::FETCH_UNIQUE);
        return $data;
    }
    
}
// $a = new DTransaksi();
// $a->deleteByIdTr(2);
// $tes = $a->cekExistJP(2,'Treatment');
// echo (count($tes));
// $tes = $a->cekExistJP(2,'Cut');
// echo "|||".(count($tes));
