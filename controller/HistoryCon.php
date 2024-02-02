<?php
include('../class/transaksi.php');
include('../class/detilTransaksi.php');
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['history'])){
        echo ($_SESSION['htg']);
        if(strpos($_POST['history'],'press')!== false){
            // echo 'masuk histo';
        // echo 'idTemp = '.$_POST['Idtemp'].'||';
        $_SESSION['currentIdTr']=$_POST['Idtemp'];
        // echo 'current = '.$_SESSION['currentIdTr']."||";
        // echo 'masuk press'; 
        $a = new Transaksi();
        $jp = $a->cekJP($_SESSION['currentIdTr']);
        // echo $jp;
        $_SESSION['Jp'] = $jp;
        $_SESSION['htg'] = 1;
        $_SESSION['total']=$a->getdataTr($_SESSION['currentIdTr'],1);
        $_SESSION['back']=$a->getdataTr($_SESSION['currentIdTr'],2);
        $_SESSION['pay']=$a->getdataTr($_SESSION['currentIdTr'],3);
        $_SESSION['tgl']=$a->getdataTr($_SESSION['currentIdTr'],4);
        $_SESSION['time']=$a->getdataTr($_SESSION['currentIdTr'],5);
        $_SESSION['kirim']='Edit';
        $_SESSION['currSts']='Edit';
        echo ($_SESSION['htg']);
        // die;
        header('Location:../cpage/kasir.php');
        exit();

        }
        
        else if(strpos($_POST['history'],'delete')!== false){
            // echo 'masuk delete';
            $_SESSION['currentIdTr']=$_POST['Idtemp'];


            $x = new Transaksi();
            $y = new DTransaksi();

            $idTr = $_SESSION['currentIdTr'];
            // echo $idTr;
            $y->deleteByIdTr($idTr);
            $x->deleteTr($idTr);
            $_SESSION['htg']=0;
            // echo 'apa ini';
            

            header('Location:../cpage/kasir.php');
        }
        

    }
}

?>