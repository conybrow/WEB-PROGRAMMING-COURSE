<?php
session_start();
include('header.php');
include('../class/transaksi.php');
$tr = new Transaksi();
// $_SESSION['currentIdTr']=0;
// $_SESSION['currentIdTr']=null;
if($_SESSION['htg']==0){
    $_SESSION['currentIdTr']=0;
    $_SESSION['total']=0;
    $_SESSION['back']=0;
    $_SESSION['pay']=0;
    $_SESSION['tgl']=0;
    $_SESSION['time']=0;
    $_SESSION['kirim']='kirim';
    $_SESSION['currSts']='new';
}


// echo $_SESSION['htg'];
// echo $_SESSION['pay'];

?>
    <link rel="stylesheet" href="kasir.css">
    <div class="batasan2">
        <div class="konten">
            <div class="menu">
                <div class="menu1">
                    <p class="judul">HISTORY</p>
                </div>
                <div class="menu2">
                    <table id='dtable'>
                        <tr>
                            <th>NO</th>
                            <th>Id Transaksi</th>
                            <th>Tanggal</th>
                            <th>Waktu</th>
                            <th>Total</th>
                            <th>Jumlah bayar</th>
                            <th>Kembalian</th>
                        </tr>
                        <form method="POST" id="kasir" name='kasir' action="../controller/HistoryCon.php">
                            <input type="text" value="0" id="Idtemp" name="Idtemp">
                            <input type="text" value=<?php if(isset($_SESSION['Jp'])){echo $_SESSION['Jp'];}?> id="jpCode" name="jpCode">
                            
                            <?php
                            updateTable();
                            ?>
                        </form>
                    </table>

                </div>
            </div>
            <div class="struk">
                <form method="POST" id="kasir" name='kasir' action="../controller/KasirCon.php">
                    <div id="inStruk">
                        <div class="struk1">
                            <p>TRANSAKSI</p>
                        </div>
                        <div class="inInStruk">
                            <div class="isi">
                                <div id="ket1">
                                    <div>
                                        <label name="tgl" id="tgl"><?php setlocale(LC_TIME, 'id_ID'); if($_SESSION['htg']==0){echo strftime("%A, %e %B %Y");}else{echo $_SESSION['tgl'];};?> 
                                        || <?php date_default_timezone_set('Asia/Jakarta'); if($_SESSION['htg']==0){echo date("H:i:s");}else{echo $_SESSION['time'];};?> </label>
                                    </div>
                                    <div>
                                        <!-- sedang benerin class transaksi -->
                                        <label id="idKasir"><?php echo $_SESSION['namaPanjang']; ?> || <?php if($_SESSION['htg']==0){echo $tr->makeid();}else{echo $_SESSION['currentIdTr'];}?></label>
                                        <input type = 'text' value='<?php $g = new Transaksi; if($_SESSION['htg']==0){echo $g->makeid();}else{echo $_SESSION['currentIdTr'];} ?>'name='idNota' id='idTr' >
                                        
                                        <input type="text" value="<?php echo $_SESSION['currentIdTr']?>" id="currentId" name="currentId">
                                        <input type="text" value="<?php echo $_SESSION['currSts']?>" id="currSts" name="currSts">
                                        <!-- <label id="idNota">Jp</label> -->
                                        <input type = 'text' value='<?php try{$a = new Transaksi(); $Jp = $a->cekJP($_SESSION['currentIdTr']); echo $Jp;}catch(Exception $e){echo null;}?>'name='Jp' id='Jp'>
                                        <!-- <br /><b>Warning</b>:  Undefined array key 15 in <b>C:\xampp\htdocs\webprog2023\1201222005_eviF\cpage\kasir.php</b> on line <b>56</b><br />0 -->
                                        
                                    </div>
                                </div>
                                <div id="field2" class="k">
                                    <label id="total" name="total"><p>JENIS PELAYANAN</p></label>
                                    <div>
                                        <div id="tata">
                                            <label><p>Wash</p></label>
                                            <input type="checkbox" value="wash" id="Wash" name="wash" />
                                        </div>
                                        <div id="tata">
                                            <label><p>Wash  And Haircut</p></label>
                                            <input type="checkbox" value="washCut" id="washCut" name="washCut" />
                                        </div>
                                        <div id="tata">
                                            <label><p>Treatment</p></label>
                                            <input type="checkbox" value="Treatment" id="Treatment" name="Treatment" />
                                        </div>
                                        <div id="tata">
                                            <label><p>Cut</p></label>
                                            <input type="checkbox" value="Cut" id="Cut" name="Cut" />
                                        </div>

                                    </div>

                                </div>
                                <div id="field">
                                    <label id="total" name="total"><p>TOTAL</p></label>
                                    <input id="Total" type="text" value='<?php if($_SESSION['htg']==0){echo 0;}else{echo $_SESSION['total'];}?>'  name="masukanharga" placeholder="Nominal input" />
                                </div>
                                <div id="field">
                                    <label id="jumlahBayar"><p>Jumlah Pembayaran</p></label>
                                    <input id="NominalBayar" type="text" name="jumlahBayar" value = '<?php if($_SESSION['htg']==0){echo 0;}else{echo $_SESSION['pay'];}?>' placeholder="Nominal uang" />
                                </div>
                                <div id="field2">
                                    <label id="kembalian" name="kembalian"><p>Kembalian     : Rp. -</p></label>

                                </div>
                                <div class="tombol">
                                    
                                    <button type="submit" value='<?php if($_SESSION['htg']<=2){echo $_SESSION['kirim'];}else{$_SESSION['kirim']='Update';echo $_SESSION['kirim'];} ?>' name='kirim' id='kirim'>kirim</button>
                                    <button type="submit" value='Batal' name='Batal' id='Batal' >Batal</button>
                                </div>
                            </div>
                        </div>
                </form>
                </div>

            </div>
        </div>
        <script type="text/javascript" src="../cjs/KasirJs.js "></script>
        <script type="text/javascript" src="../cjs/kasir.js "></script>
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

        
        echo '<td><button type="submit" value="press/'.$id[$hitung].'" id="press" name="history">View</button></td>';
        echo '<td><button type="submit" value="delete/'.$id[$hitung].'" id="press" name="history">Delete</button></td>';
        echo '</tr>';
        $hitung++;
    }
}

?>