<?php 
error_reporting(0);
include '../../conn.php';
include '../datakaryawan.php';
include '../k-means.php';

echo 'Lampiran 5. Normalisasi Matriks Moora';
echo '<br>';
echo '<br>';
function normalisasimoora($kolom){
    $normalisasi=[];
    $i=1;
    foreach($kolom as $k){
        $normalisasi['data'][$i] = pow($k,2);
        $i++;
    }
    $normalisasi['sum'] = array_sum($normalisasi['data']);
    $normalisasi['sqrt'] = sqrt($normalisasi['sum']);

    $j=1;
    foreach($kolom as $k){
        $normalisasi['data'][$j] = $k/$normalisasi['sqrt'];
        $j++;
    }
    return $normalisasi;
}

for($i=1; $i<=count($hasil_k_means['layak']); $i++){
    $layak_mutu_kerja['data'][$i] = $hasil_k_means['layak'][$i]['mutu_kerja'];
    $layak_tanggung_jawab['data'][$i] = $hasil_k_means['layak'][$i]['tanggung_jawab'];
    $layak_inisiatif['data'][$i] = $hasil_k_means['layak'][$i]['inisiatif'];
    $layak_kejujuran['data'][$i] = $hasil_k_means['layak'][$i]['kejujuran'];
    $layak_absensi['data'][$i] = $hasil_k_means['layak'][$i]['mutu_kerja'];
}

for($i=1; $i<=count($hasil_k_means['tidak_layak']); $i++){
    $tidak_layak_mutu_kerja['data'][$i] = $hasil_k_means['tidak_layak'][$i]['mutu_kerja'];
    $tidak_layak_tanggung_jawab['data'][$i] = $hasil_k_means['tidak_layak'][$i]['tanggung_jawab'];
    $tidak_layak_inisiatif['data'][$i] = $hasil_k_means['tidak_layak'][$i]['inisiatif'];
    $tidak_layak_kejujuran['data'][$i] = $hasil_k_means['tidak_layak'][$i]['kejujuran'];
    $tidak_layak_absensi['data'][$i] = $hasil_k_means['tidak_layak'][$i]['mutu_kerja'];
}


echo 'Normalisasi Klaster Layak';
echo '<br>';
echo '<br>';
echo 'Kolom Mutu Kerja';
echo '<br>';
echo '<br>';
for($i=1; $i<=count($hasil_k_means['layak']); $i++){
    // $normalisasi['text'][$i] = $karyawan[$i]['kode'].' = ';
    
    echo $karyawan[$i]['kode'].' = ';
    echo $layak_mutu_kerja['data'][$i].' / &#8730;';
    for($j=1; $j<=count($layak_mutu_kerja['data']); $j++){
        if($j == count($layak_mutu_kerja['data'])){
            echo $layak_mutu_kerja['data'][$j].'&sup2;';
            echo ' = '.normalisasimoora($layak_mutu_kerja['data'])['data'][$i];
        }else{
            echo $layak_mutu_kerja['data'][$j].'&sup2;'.' + ';
        }
    }
    echo '<br>';
    echo '<br>';
}

echo '<br>';
echo '<br>';
echo 'Kolom Tanggung Jawab';
echo '<br>';
echo '<br>';
for($i=1; $i<=count($hasil_k_means['layak']); $i++){
    // $normalisasi['text'][$i] = $karyawan[$i]['kode'].' = ';
    
    echo $karyawan[$i]['kode'].' = ';
    echo $layak_tanggung_jawab['data'][$i].' / &#8730;';
    for($j=1; $j<=count($layak_tanggung_jawab['data']); $j++){
        if($j == count($layak_tanggung_jawab['data'])){
            echo $layak_tanggung_jawab['data'][$j].'&sup2;';
            echo ' = '.normalisasimoora($layak_tanggung_jawab['data'])['data'][$i];
        }else{
            echo $layak_tanggung_jawab['data'][$j].'&sup2;'.' + ';
        }
    }
    echo '<br>';
    echo '<br>';
}

echo '<br>';
echo '<br>';
echo 'Kolom Inisiatif';
echo '<br>';
echo '<br>';
for($i=1; $i<=count($hasil_k_means['layak']); $i++){
    // $normalisasi['text'][$i] = $karyawan[$i]['kode'].' = ';
    
    echo $karyawan[$i]['kode'].' = ';
    echo $layak_inisiatif['data'][$i].' / &#8730;';
    for($j=1; $j<=count($layak_inisiatif['data']); $j++){
        if($j == count($layak_inisiatif['data'])){
            echo $layak_inisiatif['data'][$j].'&sup2;';
            echo ' = '.normalisasimoora($layak_inisiatif['data'])['data'][$i];
        }else{
            echo $layak_inisiatif['data'][$j].'&sup2;'.' + ';
        }
    }
    echo '<br>';
    echo '<br>';
}

echo '<br>';
echo '<br>';
echo 'Kolom Kejujuran';
echo '<br>';
echo '<br>';
for($i=1; $i<=count($hasil_k_means['layak']); $i++){
    // $normalisasi['text'][$i] = $karyawan[$i]['kode'].' = ';
    
    echo $karyawan[$i]['kode'].' = ';
    echo $layak_kejujuran['data'][$i].' / &#8730;';
    for($j=1; $j<=count($layak_kejujuran['data']); $j++){
        if($j == count($layak_kejujuran['data'])){
            echo $layak_kejujuran['data'][$j].'&sup2;';
            echo ' = '.normalisasimoora($layak_kejujuran['data'])['data'][$i];
        }else{
            echo $layak_kejujuran['data'][$j].'&sup2;'.' + ';
        }
    }
    echo '<br>';
    echo '<br>';
}

echo '<br>';
echo '<br>';
echo 'Kolom Absensi';
echo '<br>';
echo '<br>';
for($i=1; $i<=count($hasil_k_means['layak']); $i++){
    // $normalisasi['text'][$i] = $karyawan[$i]['kode'].' = ';
    
    echo $karyawan[$i]['kode'].' = ';
    echo $layak_absensi['data'][$i].' / &#8730;';
    for($j=1; $j<=count($layak_absensi['data']); $j++){
        if($j == count($layak_absensi['data'])){
            echo $layak_absensi['data'][$j].'&sup2;';
            echo ' = '.normalisasimoora($layak_absensi['data'])['data'][$i];
        }else{
            echo $layak_absensi['data'][$j].'&sup2;'.' + ';
        }
    }
    echo '<br>';
    echo '<br>';
}

// dd($normalisasi);

?>