<?php 
include 'datakaryawan.php';
include 'k-means.php';
include 'moora.php';

function hasilhrd($k){

    $layak = 75+72+75+80+80;
    $tidak_layak = 70+70+68+70+70;

    $i=0;
    foreach($k as $d){
        $hasilhrd[$i]['kode'] = $d['kode'];
        $hasilhrd[$i]['nama'] = $d['nama'];
        $hasilhrd[$i]['hasil'] = $d['mutu_kerja']+$d['tanggung_jawab']+$d['inisiatif']+$d['kejujuran']+$d['absensi'];
        if($hasilhrd[$i]['hasil'] > $layak && $hasilhrd[$i]['hasil'] > $tidak_layak){
            $hasilhrd[$i]['klaster'] = 'layak';
        }elseif($hasilhrd[$i]['hasil'] >= $tidak_layak){
            $hasilhrd[$i]['klaster'] = 'tidak layak';
        }else{
            $hasilhrd[$i]['klaster'] = 'tidak layak';
        }
        $i++;
    }
    return $hasilhrd;
}

$i = 0;
foreach($hasil_moora['layak'] as $d){
    $akurasi['sistem'][$i] = $d;
    $urut = str_replace("A", "", $d['kode']);
    $akurasi['sistem'][$i]['urut'] = intval($urut);
    $akurasi['sistem'][$i]['klaster'] = 'layak';
    $i++;
}
foreach($hasil_moora['tidak_layak'] as $d){
    $akurasi['sistem'][$i] = $d;
    $urut = str_replace("A", "", $d['kode']);
    $akurasi['sistem'][$i]['urut'] = intval($urut);
    $akurasi['sistem'][$i]['klaster'] = 'tidak layak';
    $i++;
}

usort($akurasi['sistem'], function($a, $b) {
    return $a['urut'] >= $b['urut'];
});

$akurasi['hrd'] = hasilhrd($karyawan);



// $layak = 75+72+75+80+80; // 382
// $tidak_layak = 70+70+68+70+70; // 348

// echo $layak;
// echo $tidak_layak;

// dd($akurasi['hrd'][30]);

// PERHITUNGAN AKURASI 

$j=0; 
$hasil_akurasi['tp']=0;
$hasil_akurasi['tn']=0;
$hasil_akurasi['fp']=0;
$hasil_akurasi['fn']=0;
foreach($akurasi['sistem'] as $k){ 
    $hasil_akurasi[$j]['kode'] = $k['kode'];
    $hasil_akurasi[$j]['nama'] = $k['nama'];
    $hasil_akurasi[$j]['sistem'] = $k['klaster'];
    $hasil_akurasi[$j]['hrd'] = $akurasi['hrd'][$j]['klaster'];
    if($hasil_akurasi[$j]['sistem'] == 'layak' && $hasil_akurasi[$j]['hrd'] == 'layak'){
        $hasil_akurasi['tp']++;
    }
    if($hasil_akurasi[$j]['sistem'] == 'tidak layak' && $hasil_akurasi[$j]['hrd'] == 'tidak layak'){
        $hasil_akurasi['tn']++;
    }
    if($hasil_akurasi[$j]['sistem'] == 'tidak layak' && $hasil_akurasi[$j]['hrd'] == 'layak'){
        $hasil_akurasi['fp']++;
    }
    if($hasil_akurasi[$j]['sistem'] == 'layak' && $hasil_akurasi[$j]['hrd'] == 'tidak layak'){
        $hasil_akurasi['fn']++;
    }
    $j++;
}



$jumlahtptn = $hasil_akurasi['tp']+$hasil_akurasi['tn'];
$jumlahtptnfpfn = $hasil_akurasi['tp']+$hasil_akurasi['tn']+$hasil_akurasi['fp']+$hasil_akurasi['fn'];
$jbagi = $jumlahtptn/$jumlahtptnfpfn;

$hasil_akurasi['akurasi'] = substr(($jbagi*100), 0, 5);
$hasil_akurasi['akurasi'] .= '%';

// dd($hasil_akurasi['akurasi']);
?>



<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <style>
    .table-custom{
    border: 1px solid black;
    font-size: 10px !important;
    padding: 14px !important;
    margin:0;
    }
    .table-custom tr, .table-custom th, .table-custom td{
    border: 1px solid black !important;
    }
    .nilai{
        max-width: 70px !important;
    }
    .klaster{
        width: 100px !important;
    }
    .nama{
        width: 220px !important;
    }
</style>
</head>
<body class="pb-5">
<div class="" style="margin-bottom: 30px; margin-left: 10px; margin-top: 30px;">
<p>Lampiran 9. Tabel Akurasi</p> 
<p style="">Akurasi Hitung Sistem & HRD</p> 
TP ( True Positif ) = jumlah data
yang layak menurut hrd dan layak menurut
sistem <br>
TN ( True Negatif)= jumlah data yang
tidak layak menurut hrd dan tidak layak menurut sistem <br>
FP ( False Positif )= jumlah data
layak menurut hrd namun tidak menurut
layak sistem <br>
FN ( False Negatif)=jumlah data tidak layak menurut hrd 
namun layak menurut sistem<br>   
<p style="margin-bottom:0; margin-top: 10px;">TP = <?php echo $hasil_akurasi['tp']; ?></p>    
<p style="margin-bottom:0;">TN = <?php echo $hasil_akurasi['tn']; ?></p>   
<p style="margin-bottom:0;">FP = <?php echo $hasil_akurasi['fp']; ?></p>   
<p style=";">FN = <?php echo $hasil_akurasi['fn']; ?></p>   
<p>Menghitung akurasi = (TP+TN)/(TP+TN+FP+FN) * 100%)</p>
<p style="">Akurasi = <?php echo $hasil_akurasi['akurasi']; ?></p>   
    <table class="table table-custom table-bordered" style="max-width: 700px;">
      <thead>
        <tr>
          <th>No.</th>
          <th class="nilai">Kode</th>
          <th class="nilai">Nama</th>
          <th class="nilai">Sistem</th>
          <th class="nilai">HRD</th>
        </tr>
      </thead>
      <tbody>
      <?php $i=1; $j=0; foreach($akurasi['sistem'] as $k){ ?>
        <tr>
          <td><?php echo $i++; ?></td>
          <td><?php echo $k['kode']; ?></td>
          <td class="nilai"><?php echo $k['nama']; ?></td>
          <td class="nilai"><?php echo $k['klaster']; ?></td>
          <td class="nilai"><?php echo $akurasi['hrd'][$j++]['klaster']; ?></td>
        </tr>
      <?php  } ?>
      </tbody>
    </table>
</div>
</body>
</html>