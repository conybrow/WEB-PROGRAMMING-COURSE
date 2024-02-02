// console.log('masuk');
document.addEventListener("DOMContentLoaded", (event) => {
    // event.preventDefault();

    let ButHapus = document.getElementById('Batal');
    let ubah = document.getElementById('kirim');
    console.log('kirim = ' + ubah.value);

    let idTr = document.getElementById('idTr');
    idTr.style.display = 'none';
    idTr.disabled = true;
    let currentId = document.getElementById('currentId');
    currentId.style.display = 'none';
    currentId.disabled = true;
    let sts = document.getElementById('currSts');
    sts.style.display = 'none';
    sts.disabled = true;
    let JP = document.getElementById('Jp');
    JP.style.display = 'none';
    JP.disabled = true;

    ButHapus.disabled = true;
    let form = document.forms[0];
    let pay = document.getElementById('NominalBayar');
    let total = document.getElementById('Total');
    if (pay <= total) {

    }
    let data = document.getElementById('Jp');
    let i = data.value;
    let wash = document.getElementById('Wash');
    let washC = document.getElementById('washCut');
    let T = document.getElementById('Treatment');
    let C = document.getElementById('Cut');
    let sts2 = sts.value;
    console.log('Status : ' + sts2);
    let kondisi = true;
    ubah.innerText = 'kirim';
    if (sts2 == 'new' || sts2 == 'Update') {
        kondisi = false;
    }
    if (sts2 == 'kirim' || sts2 == 'new') {
        ButHapus.style.display = 'none';
        let a = false;
        console.log(pay.value);

        // if ((wash.checked === a && washC.checked === a && T.checked === a && C.checked === a) || (pay.value === 0)) {
        //     event.preventDefault();
        // }
    }
    if (sts2 == 'Edit' || sts2 == 'Update') {
        // ButHapus.style.display = "";
        ButHapus.disabled = false;
        ButHapus.style.display = '';

    }
    if (sts2 == 'Edit') {
        ubah.innerText = 'Edit';
        // ButHapus.style.display = '';

        console.log(data.value);

        wash.checked = i.includes('W1');
        wash.disabled = true;
        // console.log((!i.includes('W1')));
        washC.checked = i.includes('W2');
        washC.disabled = true;
        T.checked = i.includes('T');
        T.disabled = true;
        C.checked = i.includes('C');
        C.disabled = true;
        console.log(ubah.value);
        console.log('kirim on Edit = ' + ubah.value);
    }
    if (sts2 == 'Update') {
        ubah.innerText = 'Update';
        wash.checked = i.includes('W1');
        // console.log((!i.includes('W1')));
        washC.checked = i.includes('W2');
        T.checked = i.includes('T');
        C.checked = i.includes('C');
        kondisi = false;
    }
    wash.disabled = kondisi;
    washC.disabled = kondisi;
    T.disabled = kondisi;
    C.disabled = kondisi;
    let table = document.getElementById('dtable');
    table.addEventListener('click', function gas(evt) {


        if (evt.target.value.includes('press') || evt.target.value.includes('delete')) {


            // ButHapus.style.display = "block";
            let pres = evt.target;
            // console.log(pres);
            let row = pres.closest('tr');
            // console.log(row);
            // console.log(row);
            let hitung = 0;
            row.querySelectorAll('td').forEach((cell) => {
                hitung += 1;
                // console.log(hitung + ". " + cell.textContent);

            })
            let colom = row.querySelectorAll('td');
            let id = colom[1].textContent;
            // console.log(id);
            let tanggal = colom[2].textContent;
            let waktu = colom[3].textContent;
            let total = colom[4].textContent;
            let jumlahbayar = colom[5].textContent;
            let kembalian = colom[6].textContent;
            let press = colom[7];
            // console.log("press : " + press.value);
            // press.innerText = "Diubah";

            press.addEventListener('click', function(go) {
                // let ButHapus = document.getElementById('Batal');
                // ButHapus.style.display = "";

                ubah.innerText = 'Edit';
                let total = document.getElementById('Total');
                total.readOnly = true;

                pay.readOnly = true;
                // console.log('masuk kasir.js')



            })
            let idtemp = document.getElementById('Idtemp');
            idtemp.value = id;
            let idTr = document.getElementById('idTr');
            idTr.value = idtemp.value;
            // evt.preventDefault();
            // evt.stopPropagation();
            // console.log(Jp);

        }

    })


    let fengyi = function(Nama) {
        let dokum = document.getElementById(Nama);
        dokum.addEventListener('input', function(er) {
            let isi = 0;
            let wash1 = document.getElementById('Wash');
            let washcut1 = document.getElementById('washCut');
            let treatment1 = document.getElementById('Treatment');
            let cut1 = document.getElementById('Cut');

            let numW = wash1.value;
            let numWc = washcut1.value;
            let numT = treatment1.value;
            let numC = cut1.value;
            if (wash1.checked === true) {
                isi += 20000
            }
            if (washcut1.checked === true) {
                isi += (20000 + 45000)
            }
            if (treatment1.checked === true) {
                isi += 127000
            }
            if (cut1.checked === true) {
                isi += 45000
            }

            total.value = isi;

        })
    }

    let fengxi = function(Nama) {
        let dokum = document.getElementById(Nama);
        dokum.addEventListener('input', function(er) {

            let byr = document.getElementById('NominalBayar').value;
            let ttl = document.getElementById('Total').value;
            if (byr < ttl) {
                labelback.textContent = 'Kembalian : Rp. ';
            }
            if (byr >= ttl) {
                let back = byr - ttl;
                let labelback = document.getElementById('kembalian');
                labelback.textContent = 'Kembalian : Rp. ' + back;
            }

        })
    }






    fengyi('Wash');
    fengyi('washCut');
    fengyi('Treatment');
    fengyi('Cut');

    // fengxi('Total');
    fengxi('NominalBayar');



});