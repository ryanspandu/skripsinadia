<?php 
error_reporting(0);
include '../../conn.php';
include '../datakaryawan.php';
include '../k-means.php';
include '../moora.php';

// dd($karyawan_moora);

// Optimasi layak
echo 'Optimasi Moora Layak';
echo '<br>';
echo '<br>';
$i=0;
foreach($karyawan_moora['layak'] as $l){
    echo $l['kode'];
    echo ' = ';
    echo $l['mutu_kerja'].' + ';
    echo $l['tanggung_jawab'].' + ';
    echo $l['inisiatif'].' + ';
    echo $l['kejujuran'].' + ';
    echo $l['absensi'].' = ';
    echo $hasil_moora['layak'][$i]['optimasi'];
    echo '<br>';
    $i++;
}

// Optimasi tidak layak
echo '<br>';
echo '<br>';
echo 'Optimasi Moora Tidak Layak';
echo '<br>';
echo '<br>';
$i=0;
foreach($karyawan_moora['tidak_layak'] as $l){
    echo $l['kode'];
    echo ' = ';
    echo $l['mutu_kerja'].' + ';
    echo $l['tanggung_jawab'].' + ';
    echo $l['inisiatif'].' + ';
    echo $l['kejujuran'].' + ';
    echo $l['absensi'].' = ';
    echo $hasil_moora['tidak_layak'][$i]['optimasi'];
    echo '<br>';
    $i++;
}
?>