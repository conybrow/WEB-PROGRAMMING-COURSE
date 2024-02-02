<?php
session_start();
include('header.php');
?>
<link rel="stylesheet" href="Beranda.css">
    <div class="batasan2">
            <div>

            </div>
            <!-- ///// -->
            <div class="konten">
                <p>SELAMAT MEMULAI SHIFTNYA KAK </p>
                <p><?php echo strtoupper($_SESSION['namaPanjang']);?></p>
            </div>
            <!-- ////// -->
    </div>
<?php
include('footer.php');
?>