<?php
include ('../class/akun2.php');
echo @$_POST['login'];

if(@$_POST['login']==="login"){
    $usr = $_POST['Username'];
    $pwd = $_POST['Password'];


    $a = new Akun();
    if($usr!=null && $pwd!=null){
        // echo $usr;
        $getArry = $a->showByatribut($usr,'username');
        var_dump($getArry);
        $finddata = $a->getData($usr,$getArry);
        if($finddata!=null){
            $readpw = $a->getData($pwd,$getArry);
            if($pwd==$readpw){
                // var_dump($getArry);
                
                $keys = array_keys($getArry);
                $id = $keys[0];
                $np = $getArry[$id]['fullName'];


                session_start();
                $_SESSION['idKasir']=$id;
                echo $_SESSION['id'];
                $_SESSION['namaPanjang']=$np;
                $_SESSION['htg']=0;
                echo $_SESSION['namapjg'];
                // die;
                header('Location:../cpage/Beranda.php');
            }
            else{
                echo 'pw salah';
            }
        }
        else{
            echo 'username gada';
        }
    }
    else{
        echo 'unm kosong';
    }
}
else{
    header('Location:../cpage/Registrasi.php');
}




?>
<?php 
if($_SESSION['htg']==0)
{echo 0;}
else{echo $_SESSION['total'];}?>