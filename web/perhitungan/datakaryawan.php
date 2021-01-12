<?php
include '../conn.php';

$data = mysqli_query($conn,"select * from karyawan_kontrak where status='acc'");
// Data karyawan perbaris
$i = 1;
$karyawan = [];
while($d = mysqli_fetch_array($data)){ 
    $karyawan[$i]['kode'] = 'A'.$i;
    $karyawan[$i]['nama'] = $d['nama'];
    $karyawan[$i]['mutu_kerja'] = floatval($d['mutu_kerja']);
    $karyawan[$i]['tanggung_jawab'] = floatval($d['tanggung_jawab']);
    $karyawan[$i]['inisiatif'] = floatval($d['inisiatif']);
    $karyawan[$i]['kejujuran'] = floatval($d['kejujuran']);
    $karyawan[$i]['absensi'] = floatval($d['absensi']);
    $i++;
}

// Data perkolom "setiap kriteri dari atas kebawah" berdasarkan kolom
// $i = 1;
// $kolom_nama = [];
// $kolom_mutu_kerja = [];
// $kolom_tanggung_jawab = [];
// $kolom_inisiatif = [];
// $kolom_kejujuran = [];
// $kolom_absensi = [];
// foreach($karyawan as $d){ 
//     $kolom_nama[$i] = $d['nama'];
//     $kolom_mutu_kerja[$i] = $d['mutu_kerja'];
//     $kolom_tanggung_jawab[$i] = $d['tanggung_jawab'];
//     $kolom_inisiatif[$i] = $d['inisiatif'];
//     $kolom_kejujuran[$i] = $d['kejujuran'];
//     $kolom_absensi[$i] = $d['absensi'];
//     $i++;
// }

// inisialisasi klaster awal
$layak['mutu_kerja'] = 75;
$layak['tanggung_jawab'] = 72;
$layak['inisiatif'] = 75;
$layak['kejujuran'] = 80;
$layak['absensi'] = 80;

$tidak_layak['mutu_kerja'] = 70;
$tidak_layak['tanggung_jawab'] = 70;
$tidak_layak['inisiatif'] = 68;
$tidak_layak['kejujuran'] = 70;
$tidak_layak['absensi'] = 70;
?>