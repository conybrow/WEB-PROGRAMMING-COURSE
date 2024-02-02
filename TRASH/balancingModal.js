let typingTimer; //tunggu proses hapus field biar ga eror
let doneTyping = 200;

document.addEventListener("DOMContentLoaded", (event) => {
    // let form = document.forms[1];
    let uangril = document.getElementById('uangOffline');
    let rp100 = 0;
    let rp200 = 0;
    let rp500 = 0;
    let rp1000 = 0;
    let rp2000 = 0;
    let rp5000 = 0;
    let rp10000 = 0;
    let rp20000 = 0;
    let rp50000 = 0;
    let rp100000 = 0;
    let runData = function(Nama) {
        let dokum = document.getElementById(Nama);
        dokum.addEventListener('input', function(isi0) {
            clearTimeout(typingTimer);
            typingTimer = setTimeout(function() {
                let nilainya = 0;
                if (isi0.target.value !== "" && isi0.target.value !== "0") {
                    nilainya = parseInt(isi0.target.value);
                }
                // console.log("nilainya NAN? ", isNaN(isi0.target.value))
                // console.log("JALAN KOK INPUTAN")
                // console.log("ini nilainya : ", nilainya)
                let temp = 0;
                let k = 0
                if (uangril.value == "") {
                    k = 0
                } else {
                    k = parseInt(uangril.value)
                }
                console.log
                console.log(getBefore(Nama))
                let kali = parseInt(readId(Nama));
                let bepore = getBefore(Nama);
                let temp2 = k + (nilainya * kali) - bepore * kali;
                saveBefore(Nama, nilainya);
                uangril.value = temp2;
            }, doneTyping);
        })


        console.log("JALANRUNDATA AJA")
    }
    let readId = function(id) {
        if (id.match(/\d+/g)) {
            let toNum = id.match(/\d+/g).map(Number);
            return toNum[0];
        }
    }
    let saveBefore = function(id, nominal, ) {
        let whtIs = readId(id);
        if (whtIs == 100) { rp100 = nominal }
        if (whtIs == 200) { rp200 = nominal }
        if (whtIs == 500) { rp500 = nominal }
        if (whtIs == 1000) { rp1000 = nominal }
        if (whtIs == 2000) { rp2000 = nominal }
        if (whtIs == 5000) { rp5000 = nominal }
        if (whtIs == 10000) { rp10000 = nominal }
        if (whtIs == 20000) { rp20000 = nominal }
        if (whtIs == 50000) { rp50000 = nominal }
        if (whtIs == 100000) { rp100000 = nominal }
    }
    let getBefore = function(id) {
        let whtIs = readId(id)
        if (whtIs == 100) { back = rp100 }
        if (whtIs == 200) { back = rp200 }
        if (whtIs == 500) { back = rp500 }
        if (whtIs == 1000) { back = rp1000 }
        if (whtIs == 2000) { back = rp2000 }
        if (whtIs == 5000) { back = rp5000 }
        if (whtIs == 10000) { back = rp10000 }
        if (whtIs == 20000) { back = rp20000 }
        if (whtIs == 50000) { back = rp50000 }
        if (whtIs == 100000) { back = rp100000 }

        return back;
    }

    runData("rp100.00")
    runData("rp200.00")
    runData("rp500.00")
    runData("rp1000.0")
    runData("rp2000.0")
    runData("rp5000.0")
    runData("rp10000.")
    runData("rp20000.")
    runData("rp50000.")
    runData("rp100000")

})