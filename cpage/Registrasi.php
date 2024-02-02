<html lang="id">
<link rel="stylesheet" href="Registrasi.css">

</html>

<body>
    <div class="batasan2">
        <div class="konten">
            <form method="POST" id="loginForm" action="../controller/RegisCon.php">
                <p id="regis">REGISTRASI</p>
                <input type="text" id="uname" name="Username" placeholder="Set Username..">
                <input type="text" id="nmpjg" name="NamaPanjang" placeholder="Full Name..">
                <input type="text" id="email" name="Email" placeholder="Alamat Email..">
                <input type="text" id="verif" name="verifEmail" placeholder="Kode Verifikasi Email (XXX-XXX)">
                <!-- <input type="checkbox" id="kanan2" name="Gender" placeholder="Alamat Email.."> -->
                <select aria-placeholder="Negara" id="negara" name="negara">
                    <option value="g1" disabled selected>-Negara-</option>
                    <option value="Indonesia">Indonesia</option>
                    <option value="Korea Selatan">Korea Selatan</option>
                    <option value="Amerika">Amerika</option>
                </select>
                <input type="password" id="pass" name="Password" placeholder="Set Password..">
                <input type="password" id="konfirpass" name="KonfirPassword" placeholder="Retype Password..">
                <input type="text" id="bawah" name="capthcha" placeholder="9+11?">
                <input type="submit" name='regis' id='regiss' value='Submit'>
                <div id="atur">
                    <p id="registerT"> sudah punya akun? </p>
                    <input type='submit' id="dis2" href="index.html" value='login'>
                </div>

            </form>


        </div>
    </div>
    <!-- <script>
        function showall() {
            alert("username : " + make('uname') +
                "\nnama : " + make('nmpjg') +
                "\nemail : " + make('email') +
                "\nNegara : " + getselect('negara') + v);
            alert("ini");
        }
        let hitung = 0;

        function make(variabel) {
            let nama = document.getElementById(variabel).value;
            return nama;
        }

        function getselect(variabel) {
            let getelement = document.getElementById(variabel);
            let selected = getelement.options[getelement.selectedIndex];
            let namanegara = selected.text;
            return namanegara;
        }

        function setvalue(variabel, isi) {
            let getelement = document.getElementById(variabel);
            //getelement.value = make('uname');
            getelement.value = make(variabel);
        }
        document.addEventListener("DOMContentLoaded", function() {
            const daftartbl = document.getElementById("daftar");

            function alertregis() {
                let a = document.getElementById("uname");
                let b = document.getElementById("nmpjg");
                let c = document.getElementById("email");
                let d = document.getElementById("verif");
                let e = document.getElementById("negara").selectedIndex;
                let f = document.getElementById("negara").options[document.getElementById("negara").selectedIndex].text;
                let g = document.getElementById("pass");
                let h = document.getElementById("konfirpass");
                let i = document.getElementById("bawah").value;
                let j = (a.value == "" || b.value == "" || c.value == "" || d.value == "" || f == "-Negara-" || g.value == "" || h.value == "" || i.value == "");
                //let j = (a == "" || b == "" || c == "");
                //a == "" || b == "" || c == "" || d == "" || f == "-Negara-" || g == "" || h == "" || i == ""
                if (!j) {
                    if (h.value == g.value) {
                        alert("Terimakasih telah mendaftar silahkan login menggunakan akun yang baru kamu daftarkan!");
                        window.location.href = "Login.html";

                    } else {
                        alert("Konfirmasi Password belum sama!");

                    }
                } else {
                    alert("data belum lengkap!, mohon untuk melengkapi dahulu");
                }
            }

            function tryu() {
                let a = document.getElementById("uname");
                //a.textContent = "coba";
                a.value = "idk";

            }


            daftartbl.addEventListener('click', function() {
                //setvalue('uname','Good');
                event.preventDefault();
                alertregis();

                //tryu();
                //showall();
            });
        });
    </script> -->

</body>