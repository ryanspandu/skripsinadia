$(document).ready(function(){
    var d_count = $('table tbody tr').length;
    var kode = [];
    var nama = [];
    var mutu_kerja_data = [];
    var tanggung_jawab_data = [];
    var inisiatif_data = [];
    var kejujuran_data = [];
    var absensi_data = [];

    for(var i=1; i<=d_count; i++){
        kode.push(parseInt($('table tbody tr:nth-child('+ i +') td:nth-child(2)').html()));
        nama.push(parseInt($('table tbody tr:nth-child('+ i +') td:nth-child(3)').html()));
        mutu_kerja_data.push(parseInt($('table tbody tr:nth-child('+ i +') td:nth-child(4)').html()));
        tanggung_jawab_data.push(parseInt($('table tbody tr:nth-child('+ i +') td:nth-child(5)').html()));
        inisiatif_data.push(parseInt($('table tbody tr:nth-child('+ i +') td:nth-child(6)').html()));
        kejujuran_data.push(parseInt($('table tbody tr:nth-child('+ i +') td:nth-child(7)').html()));
        absensi_data.push(parseInt($('table tbody tr:nth-child('+ i +') td:nth-child(8)').html()));
    }

    // console.log(absensi_data);

    // =========================================================
    // NORMALISASI
    // =========================================================
    // Function pow 
    function pow(arr, arr_olah){
        var arr = arr;
        var arr_olah = arr_olah;
        arr_olah.push(Math.pow(arr[i], 2)); 
    }
    // Function sum 
    function sum_data(array){
        var sum = array.reduce(function(a, b){
            return a + b;
        }, 0);
        var akar = Math.sqrt(sum);
        return akar;
    }
    function hasil_normalisasi(x, sum){
        var x = x;
        var sum = sum;
        var hasil = x / sum;
        return hasil;
    }

    // Normalisasi x kolom mutu_kerja
    var mutu_kerja_olah = [];
    var mutu_kerja_normalisasi = [];
    for(var i=0; i<mutu_kerja_data.length; i++){
        pow(mutu_kerja_data, mutu_kerja_olah);
    }
    var mutu_kerja_sum = sum_data(mutu_kerja_olah);
    for(var i=0; i<mutu_kerja_data.length; i++){
        mutu_kerja_normalisasi.push(hasil_normalisasi(mutu_kerja_data[i], mutu_kerja_sum));
    }
    console.log("mutu_kerja data : "+mutu_kerja_data);
    console.log("mutu_kerja olah : "+mutu_kerja_olah);
    console.log("mutu_kerja sum : "+mutu_kerja_sum);
    console.log("mutu_kerja normalisasi : "+mutu_kerja_normalisasi);

    // Normalisasi x kolom tanggung_jawab
    var tanggung_jawab_olah = [];
    var tanggung_jawab_normalisasi = [];
    for(var i=0; i<tanggung_jawab_data.length; i++){
        pow(tanggung_jawab_data, tanggung_jawab_olah);
    }
    var tanggung_jawab_sum = sum_data(tanggung_jawab_olah);
    for(var i=0; i<tanggung_jawab_data.length; i++){
        tanggung_jawab_normalisasi.push(hasil_normalisasi(tanggung_jawab_data[i], tanggung_jawab_sum));
    }
    console.log("tanggung_jawab data : "+tanggung_jawab_data);
    console.log("tanggung_jawab olah : "+tanggung_jawab_olah);
    console.log("tanggung_jawab sum : "+tanggung_jawab_sum);
    console.log("tanggung_jawab normalisasi : "+tanggung_jawab_normalisasi);

    // Normalisasi x kolom inisiatif
    var inisiatif_olah = [];
    var inisiatif_normalisasi = [];
    for(var i=0; i<inisiatif_data.length; i++){
        pow(inisiatif_data, inisiatif_olah);
    }
    var inisiatif_sum = sum_data(inisiatif_olah);
    for(var i=0; i<inisiatif_data.length; i++){
        inisiatif_normalisasi.push(hasil_normalisasi(inisiatif_data[i], inisiatif_sum));
    }
    console.log("inisiatif data : "+inisiatif_data);
    console.log("inisiatif olah : "+inisiatif_olah);
    console.log("inisiatif sum : "+inisiatif_sum);
    console.log("inisiatif normalisasi : "+inisiatif_normalisasi);

    // Normalisasi x kolom kejujuran
    var kejujuran_olah = [];
    var kejujuran_normalisasi = [];
    for(var i=0; i<kejujuran_data.length; i++){
        pow(kejujuran_data, kejujuran_olah);
    }
    var kejujuran_sum = sum_data(kejujuran_olah);
    for(var i=0; i<kejujuran_data.length; i++){
        kejujuran_normalisasi.push(hasil_normalisasi(kejujuran_data[i], kejujuran_sum));
    }
    console.log("kejujuran data : "+kejujuran_data);
    console.log("kejujuran olah : "+kejujuran_olah);
    console.log("kejujuran sum : "+kejujuran_sum);
    console.log("kejujuran normalisasi : "+kejujuran_normalisasi);

    // Normalisasi x kolom absensi
    var absensi_olah = [];
    var absensi_normalisasi = [];
    for(var i=0; i<absensi_data.length; i++){
        pow(absensi_data, absensi_olah);
    }
    var absensi_sum = sum_data(absensi_olah);
    for(var i=0; i<absensi_data.length; i++){
        absensi_normalisasi.push(hasil_normalisasi(absensi_data[i], absensi_sum));
    }
    console.log("absensi data : "+absensi_data);
    console.log("absensi olah : "+absensi_olah);
    console.log("absensi sum : "+absensi_sum);
    console.log("absensi normalisasi : "+absensi_normalisasi);

    // =========================================================
    // PERANGKINGAN
    // =========================================================
    var hasil = [];
    for(var i=0; i<kode.length; i++){
        var total = [];
            total.push(mutu_kerja_normalisasi[i]);
            total.push(tanggung_jawab_normalisasi[i]);
            total.push(inisiatif_normalisasi[i]);
            total.push(kejujuran_normalisasi[i]);
            total.push(absensi_normalisasi[i]);
        var sum = total.reduce(function(a, b){
            return a + b;
        }, 0);
        hasil.push(sum);
    }
    
    // Mengurutkan
    function perbandingan(a,b){
    return a+b;
    }
    hasil.sort(perbandingan);

    console.log("Rangking : "+hasil);

    // =========================================================
    // INPUT KE HTML
    // =========================================================


    var input = "";
        input += '<div class="row">';
            input += '<div class="col-12">';
                input += '<p class="font-weight-bold">Normalisasi</p>';
            input += '</div';
        input += '<p class="font-weight-bold">Normalisasi</p>';
        // kolom mutu kerja
        var mk_k = mutu_kerja_data.length - 1;
        var k = 1;
        for(var i=0; i<kode.length; i++){
            input += '<div class="col-12 mb-3">';
                input += '<p class="mb-0">';
                input += 'x'+ k++ +'1 = '+ mutu_kerja_data[i] +' / &radic;';
                for(var j=0; j<mk_k; j++){
                    input += mutu_kerja_data[j]+'&sup2; + ';
                    if(j+2 == mutu_kerja_data.length){
                        input += mutu_kerja_data[j+1]+'&sup2;';
                    }
                }
                input += '</p>';
            input += '</div>';
        }
    
    $('#moora-data').append(input);

});