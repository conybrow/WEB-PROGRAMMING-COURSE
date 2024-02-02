<?php
session_start();
include('header.php');
include('../class/transaksi.php')
?>
<link rel="stylesheet" href="kasir.css">
<div class="batasan2">
    <div class="konten">
        <div class="menu">
            <div class="menu1">
                <p class="judul">HISTORY</p>
            </div>
            <div class="menu2">
                    <table>
                        <tr>
                            <th>NO</th>
                            <th>Id Transaksi</th>
                            <th>Tanggal</th>
                            <th>Waktu</th>
                            <th>Total</th>
                            <th>Jumlah bayar</th>
                            <th>Kembalian</th>
                        </tr>
                        <form form method="POST" id="kasir" name='kasir' action="../controller/KasirCon.php">
                        <?php
                            updateTable();
                        ?>
                        </form>
                    </table>

            </div>
        </div>
        <?php
            include('../cpage/kasirUbah.php');
        ?>
        
        </div>
    </div>
<!-- <script type="text/javascript" src="../cpage/kasirJs.js "></script> -->
<?php
include('footer.php');

function updateTable(){
    $tr = new Transaksi();
    $pjg = $tr->getPanjang();
    $array = $tr->showAll($_SESSION['idKasir']);
    $hitung = 0;
    foreach($array as $b){
        echo '<tr>';
        echo '<td> '.($hitung+1).' </td>';
        $id[$hitung]=$b['id'];
        echo '<td> '.$id[$hitung].' </td>';
        // echo 'id===='.$id[$hitung];
        $tgl[$hitung]=$b['tanggal'];
        echo '<td> '.$tgl[$hitung].' </td>';
        // echo 'id===='.$tgl[$hitung];
        $idKasir[$hitung]=$b['idKasir'];
        // echo '<td> '.$idKasir[$hitung].' </td>';
        // echo 'id===='.$idKasir[$hitung];
        $waktu[$hitung]=$b['waktu'];
        echo '<td> '.$waktu[$hitung].' </td>';
        // echo 'id===='.$waktu[$hitung];
        $total[$hitung]=$b['total'];
        echo '<td> '.$total[$hitung].' </td>';
        // echo 'id===='.$total[$hitung];
        $byr[$hitung]=$b['Jumlah_Bayar'];
        echo '<td> '.$byr[$hitung].' </td>';
        // echo 'id===='.$byr[$hitung];
        $kembali[$hitung]=$b['Kembalian'];
        echo '<td> '.$kembali[$hitung].' </td>';
        // echo 'id===='.$kembali[$hitung];

        echo '<td><input type="submit" value="press" id="press" name="history"></td>';
        echo '<td><input type="submit" value="delete" id="ubah" name="history"></td>';
        echo '</tr>';
        $hitung++;
    }
}
?>