<?php
include('../class/transaksi.php');
include('../class/detilTransaksi.php');
session_start();
setlocale(LC_TIME, 'id_ID');
date_default_timezone_set('Asia/Jakarta');
// var_dump($_POST);
// var_dump($_SESSION);
// echo $_SESSION['currentIdTr'];
// die;
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    echo $_POST['wash'];
    // echo $_POST['kirim'];
    echo ($_SESSION['htg']);
    // echo $_POST['history'];
    // $nota = $_POST['idNota'];
    // if(strpos($_POST['history'],'press')!==false){
    //     echo 'post = '.$_POST['idNota'].'||';
    //     $_SESSION['currentIdTr']=$_POST['idNota'];
    //     echo $_SESSION['currentIdTr']; 
    //     echo 'masuk press'; 
    // }
    
    // if(@$_POST['history']==='delete'){
        
    // }
    // // echo 'idUbah = '.(isset($_POST['idUbah']));
    // // if(isset($_POST['idUbah'])){
    // //     echo 'masuk';
    // //     die;
    // // }
    
    if(@$_POST['kirim']==='kirim'||$_POST['kirim']=='Update'){
        // echo $_POST['kirim']; die;
        // $_SESSION['currentIdTr']=$_POST
        // echo 'kirim work';
        // session_start();
        // echo $_SESSION['idKasir'];
        $idkasir = $_SESSION['idKasir'];
        $time = date("H:i:s");
        $tgl = strftime("%A, %e %B %Y");
        //define data trasaksi
        $newTr = new Transaksi($tgl,$idkasir,$time);
        // echo $_POST['idNota'];
        $idTr = intval($_POST['idNota']);

        if($_POST['kirim']==='kirim'){
            $idtr = $newTr->getId();
        }
        else if($_POST['kirim']==='Update'){
            $dt = new DTransaksi();
            $dt->deleteByIdTr($_POST['idNota']);
            $idTr = $_POST['currentId'];            

        }
        // echo $_SESSION['currentIdTr'];

        //masukkan detilTransaksi
        if(isset($_POST['wash'])&&($_POST['wash']==='wash')){
            $jPelayanan = 'Wash';
            $harga = 20000;
            goDT($jPelayanan,$harga,$idtr);
        }
        if(isset($_POST['washCut'])&&($_POST['washCut']==='washCut')){
            $jPelayanan = 'Wash And Haircut';
            $harga = 20000 + 45000;
            goDT($jPelayanan,$harga,$idtr);
        }
        if(isset($_POST['Treatment'])&&($_POST['Treatment']==='Treatment')){
            $jPelayanan = 'Treatment';
            $harga = 127000;
            goDT($jPelayanan,$harga,$idtr);
        }
        if(isset($_POST['Cut'])&&($_POST['Cut']==='Cut')){
            $jPelayanan = 'Cut';
            $harga = 45000;
            goDT($jPelayanan,$harga,$idtr);
        }
    
        $jumlahBayar = $_POST['jumlahBayar'];
        $Kembalian = doubleval($jumlahBayar) - doubleval($newTr->getTotal());
        
        $newTr->updateBayar($jumlahBayar,$Kembalian);
        // $_SESSION['currentIdTr']=null;
        header('Location:../cpage/kasir.php');
    }
    else if($_POST['kirim']==='Edit'){
        $_SESSION['kirim']='Update';
        $_SESSION['currSts']='Update';
        echo 'masuk';
        header('Location:../cpage/kasir.php');
    }
    else if($_POST['kirim']==='Update'){
        $_SESSION['kirim']='Edit';
        $_SESSION['currSts']='Edit';

        // echo 'masuk';
        header('Location:../cpage/kasir.php');
    }
    else if($_POST['Batal']==='Batal'){
        header('Location:../cpage/kasir.php');
        $_SESSION['htg']=0;
        $_SESSION['currSts']='kirim';
        $_SESSION['kirim']='kirim';
    }
    header('Location:../cpage/kasir.php');
}
function goDT($jenisPelayanan,$harga,$idtr){
    return new DTransaksi($jenisPelayanan,$harga,$idtr);
}





?>