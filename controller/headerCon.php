<?php
session_start();
echo 'deaderCOn||||';
echo 'klik = '.$_POST['klik'];
if(@$_POST['klik']=='kasir'){
    $_SESSION['htg'] = 0;
    header('Location:../cpage/kasir.php');
}
if(@$_POST['klik']=='bm'){
    header('Location:../cpage/balancingModal.php');
}
if(@$_POST['klik']=='profile'){
    header('Location:../cpage/Profile.php');
}

?>