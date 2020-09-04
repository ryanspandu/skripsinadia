$(document).ready(function(){
    var d_count = $('.table-data tr').length;
    var kode = [];
    var nama = [];
    var mutu_kerja_data = [];
    var tanggung_jawab_data = [];
    var inisiatif_data = [];
    var kejujuran_data = [];
    var absensi_data = [];

    for(var i=1; i<=d_count; i++){
        kode.push(parseInt($('.table-data tr:nth-child('+ i +') td:nth-child(2)').html()));
        nama.push(parseInt($('.table-data tr:nth-child('+ i +') td:nth-child(3)').html()));
        mutu_kerja_data.push(parseInt($('.table-data tr:nth-child('+ i +') td:nth-child(4)').html()));
        tanggung_jawab_data.push(parseInt($('.table-data tr:nth-child('+ i +') td:nth-child(5)').html()));
        inisiatif_data.push(parseInt($('.table-data tr:nth-child('+ i +') td:nth-child(6)').html()));
        kejujuran_data.push(parseInt($('.table-data tr:nth-child('+ i +') td:nth-child(7)').html()));
        absensi_data.push(parseInt($('.table-data tr:nth-child('+ i +') td:nth-child(8)').html()));
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
        // hasil = Math.round(hasil);
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
        // kolom mutu_kerja
        input += '<div class="col-12"><p class="font-weight-bold">Normalisasi kolom mutu kerja</p></div>';
        var mk_k = mutu_kerja_data.length - 1;
        var k = 1;
        var l = 1;
        for(var i=0; i<kode.length; i++){
            input += '<div class="col-12 mb-3">';
                input += '<p class="mb-0">';
                input += 'k'+ k++ +'1 = '+ mutu_kerja_data[i] +' / &radic;';
                for(var j=0; j<mk_k; j++){
                    input += mutu_kerja_data[j]+'&sup2; + ';
                    if(j+2 == mutu_kerja_data.length){
                        input += mutu_kerja_data[j+1]+'&sup2;';
                    }
                }
                input += '</p>';
                input += '<p>k'+ l++ +'1 = '+ mutu_kerja_normalisasi[i] +'</p>';
            input += '</div>';
        }
        // kolom tanggung_jawab
        input += '<div class="col-12"><p class="font-weight-bold">Normalisasi kolom tanggung jawab</p></div>';
        var mk_k = tanggung_jawab_data.length - 1;
        var k = 1;
        var l = 1;
        for(var i=0; i<kode.length; i++){
            input += '<div class="col-12 mb-3">';
                input += '<p class="mb-0">';
                input += 'k'+ k++ +'2 = '+ tanggung_jawab_data[i] +' / &radic;';
                for(var j=0; j<mk_k; j++){
                    input += tanggung_jawab_data[j]+'&sup2; + ';
                    if(j+2 == tanggung_jawab_data.length){
                        input += tanggung_jawab_data[j+1]+'&sup2;';
                    }
                }
                input += '</p>';
                input += '<p>k'+ l++ +'2 = '+ tanggung_jawab_normalisasi[i] +'</p>';
            input += '</div>';
        }
        // kolom inisiatif
        input += '<div class="col-12"><p class="font-weight-bold">Normalisasi kolom inisiatif</p></div>';
        var mk_k = inisiatif_data.length - 1;
        var k = 1;
        var l = 1;
        for(var i=0; i<kode.length; i++){
            input += '<div class="col-12 mb-3">';
                input += '<p class="mb-0">';
                input += 'k'+ k++ +'3 = '+ inisiatif_data[i] +' / &radic;';
                for(var j=0; j<mk_k; j++){
                    input += inisiatif_data[j]+'&sup2; + ';
                    if(j+2 == inisiatif_data.length){
                        input += inisiatif_data[j+1]+'&sup2;';
                    }
                }
                input += '</p>';
                input += '<p>k'+ l++ +'3 = '+ inisiatif_normalisasi[i] +'</p>';
            input += '</div>';
        }
        // kolom kejujuran
        input += '<div class="col-12"><p class="font-weight-bold">Normalisasi kolom kejujuran</p></div>';
        var mk_k = kejujuran_data.length - 1;
        var k = 1;
        var l = 1;
        for(var i=0; i<kode.length; i++){
            input += '<div class="col-12 mb-3">';
                input += '<p class="mb-0">';
                input += 'k'+ k++ +'4 = '+ kejujuran_data[i] +' / &radic;';
                for(var j=0; j<mk_k; j++){
                    input += kejujuran_data[j]+'&sup2; + ';
                    if(j+2 == kejujuran_data.length){
                        input += kejujuran_data[j+1]+'&sup2;';
                    }
                }
                input += '</p>';
                input += '<p>k'+ l++ +'4 = '+ kejujuran_normalisasi[i] +'</p>';
            input += '</div>';
        }
        // kolom absensi
        input += '<div class="col-12"><p class="font-weight-bold">Normalisasi kolom absensi</p></div>';
        var mk_k = absensi_data.length - 1;
        var k = 1;
        var l = 1;
        for(var i=0; i<kode.length; i++){
            input += '<div class="col-12 mb-3">';
                input += '<p class="mb-0">';
                input += 'k'+ k++ +'5 = '+ absensi_data[i] +' / &radic;';
                for(var j=0; j<mk_k; j++){
                    input += absensi_data[j]+'&sup2; + ';
                    if(j+2 == absensi_data.length){
                        input += absensi_data[j+1]+'&sup2;';
                    }
                }
                input += '</p>';
                input += '<p>k'+ l++ +'5 = '+ absensi_normalisasi[i] +'</p>';
            input += '</div>';
        }
        input += '</div>';
    
    $('#moora-data').append(input);

    // Input data ke table 
    var inputTable = '';
        inputTable += '<table style="width:50%;" class="table-custom">';
            inputTable += '<tr> <th></th> <th style="font-size:10px;">Mutu Kerja</th> <th style="font-size:10px;">Tanggung Jawab</th> <th style="font-size:10px;">Inisiatif</th> <th style="font-size:10px;">Kejujuran</th> <th style="font-size:10px;">Absensi</th> </tr>';
            var k = 1;
            for(var i=0; i<kode.length; i++){
                inputTable += '<tr>'; 
                    inputTable += '<td style="font-size: 10px;">K'+ k++ +'</td>';
                    inputTable += '<td style="font-size: 10px;">'+ mutu_kerja_normalisasi[i] +'</td>';
                    inputTable += '<td style="font-size: 10px;">'+ tanggung_jawab_normalisasi[i] +'</td>';
                    inputTable += '<td style="font-size: 10px;">'+ inisiatif_normalisasi[i] +'</td>';
                    inputTable += '<td style="font-size: 10px;">'+ kejujuran_normalisasi[i] +'</td>';
                    inputTable += '<td style="font-size: 10px;">'+ absensi_normalisasi[i] +'</td>';
                inputTable += '</tr>'; 
            }
            
    $('#moora-table').append(inputTable);

    // Input data 2 
    var input2 = '';
        input2 += '<div class="row">';
        var k = 1;
        var l = 1;
        var m = 1;
            for(var i=0; i<kode.length; i++){
                input2 += '<div class="col-12">'; 
                    input2 += '<p class="">K'+ l++ +' = '+ mutu_kerja_normalisasi[i] +' + '+ tanggung_jawab_normalisasi[i] +' + '+ inisiatif_normalisasi[i] +' + '+ kejujuran_normalisasi[i] +' + '+ absensi_normalisasi[i] +' = <span id="k'+ m++ +'">'+ hasil[i] +'</span></p>';
                    input2 += '</div>';
            }
        input2 += '</div>';
    $('#moora-data2').append(input2);

    // Table rangking 
    var inputRank = '';
        inputRank += '<button onclick="sortTable()" class="mb-2">Perangkingan</button>'
        inputRank += '<table id="myTable" style="width:50%;" class="table-custom">';
        inputRank += '<tr><th style="font-size:10px;">No.</th><th style="font-size:10px;">Nama</th> <th style="font-size:10px;">Nilai</th> </tr>';
        var j = 1;
        var k = 1;
        for(var i=0; i<kode.length; i++){
            inputRank += '<tbody class="data-rank">';
            inputRank += '<tr>'; 
                inputRank += '<td></td>';
                inputRank += '<td style="font-size: 10px;">'+ $('#nama'+j++).text() +'</td>';
                inputRank += '<td style="font-size: 10px;">'+ hasil[i] +'</td>';
            inputRank += '</tr>'; 
            inputRank += '</tbody>';
        }

    $('#moora-rangking').append(inputRank);

    // Mengurutkan
    var table, rows, switching, i, x, y, shouldSwitch;
        table = document.getElementById("myTable");
        switching = true;
        /*Make a loop that will continue until
        no switching has been done:*/
        while (switching) {
            //start by saying: no switching is done:
            switching = false;
            rows = table.rows;
            /*Loop through all table rows (except the
            first, which contains table headers):*/
            for (i = 1; i < (rows.length - 1); i++) {
            //start by saying there should be no switching:
            shouldSwitch = false;
            /*Get the two elements you want to compare,
            one from current row and one from the next:*/
            x = rows[i].getElementsByTagName("td")[2];
            y = rows[i + 1].getElementsByTagName("td")[2];
            //check if the two rows should switch place:
            if (x.innerHTML < y.innerHTML) {
                //if so, mark as a switch and break the loop:
                shouldSwitch = true;
                break;
            }
            }
            if (shouldSwitch) {
            /*If a switch has been marked, make the switch
            and mark that a switch has been done:*/
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
            }
        }

        var j = 1;
        for(var i=1; i<=kode.length; i++){
            $('.data-rank tr:nth-child('+ i +') td:nth-child(1)').text(j++);
        }
    console.log('test : '+$('.data-rank tr').length);
});