<?php
include ('../class/akun2.php');

$akun = new Akun();
if(@$_POST['regis']==='Submit'){
    $usr = $_POST['Username'];
    // echo $usr;
    $nm = $_POST['NamaPanjang'];
    // echo $nm;
    $eml = $_POST['Email'];
    // echo $eml;
    $ng = $_POST['negara'];
    // echo $ng;
    $pw = $_POST['Password'];
    // echo $pw;
    if($usr!=null && $nm!=null && $eml!=null && $ng!=null && $pw!=null){
        $scanUnm = $akun->showByatribut($usr,'Username');
        $scanEml = $akun->showByatribut($eml,'email');
        if(count($scanUnm)== 0 && count($scanEml)== 0){
            $newAkun = new Akun($nm,'1',$eml,$ng,$pw,$usr);
            $newAkun->save();
            header('Location:../cpage/index.php');
        }
    }
}
else{
    header('location:../cpage/index.php');
}
?>
