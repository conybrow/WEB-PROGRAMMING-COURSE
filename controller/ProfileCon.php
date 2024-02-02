<?php
include ('../class/akun2.php');
session_start();
$akun = new Akun();
if(@$_POST['logout']==='logout'){
    session_destroy();
    header('Location:../cpage/index.php');
}


?>