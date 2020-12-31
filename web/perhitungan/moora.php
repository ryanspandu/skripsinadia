<?php 
include '../conn.php';
include 'datakaryawan.php';
// include 'dd.php';

function normalisasi($kolom){
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

function optimasi($data){
    $i=1;
    $optimasi = [];
    foreach($data['layak'] as $d){
        $optimasi['layak'][$i]['nama'] = $d['nama'];
        $optimasi['layak'][$i]['kode'] = $d['kode'];
        $optimasi['layak'][$i]['optimasi'] = $d['mutu_kerja']+$d['tanggung_jawab']+$d['inisiatif']+$d['kejujuran']+$d['absensi'];
        $i++;
    }
    $i=1;
    foreach($data['tidak_layak'] as $d){
        $optimasi['tidak_layak'][$i]['nama'] = $d['nama'];
        $optimasi['tidak_layak'][$i]['kode'] = $d['kode'];
        $optimasi['tidak_layak'][$i]['optimasi'] = $d['mutu_kerja']+$d['tanggung_jawab']+$d['inisiatif']+$d['kejujuran']+$d['absensi'];
        $i++;
    }

    return $optimasi;
}
// dd($hasil_k_means);


$kolom_nama = [];
$kolom_kode = [];
$kolom_mutu_kerja = [];
$kolom_tanggung_jawab = [];
$kolom_inisiatif = [];
$kolom_kejujuran = [];
$kolom_absensi = [];
$i = 1;
foreach($hasil_k_means['layak'] as $d){ 
    $kolom_nama['layak'][$i] = $d['nama'];
    $kolom_kode['layak'][$i] = $d['kode'];
    $kolom_mutu_kerja['layak'][$i] = $d['mutu_kerja'];
    $kolom_tanggung_jawab['layak'][$i] = $d['tanggung_jawab'];
    $kolom_inisiatif['layak'][$i] = $d['inisiatif'];
    $kolom_kejujuran['layak'][$i] = $d['kejujuran'];
    $kolom_absensi['layak'][$i] = $d['absensi'];
    $i++;
}
$i = 1;
foreach($hasil_k_means['tidak_layak'] as $d){ 
    $kolom_nama['tidak_layak'][$i] = $d['nama'];
    $kolom_kode['tidak_layak'][$i] = $d['kode'];
    $kolom_mutu_kerja['tidak_layak'][$i] = $d['mutu_kerja'];
    $kolom_tanggung_jawab['tidak_layak'][$i] = $d['tanggung_jawab'];
    $kolom_inisiatif['tidak_layak'][$i] = $d['inisiatif'];
    $kolom_kejujuran['tidak_layak'][$i] = $d['kejujuran'];
    $kolom_absensi['tidak_layak'][$i] = $d['absensi'];
    $i++;
}
// dd($kolom_kode);
// dd(normalisasi($kolom_mutu_kerja['layak']));
$normalisasi_mutu_kerja['layak'] = normalisasi($kolom_mutu_kerja['layak']);
$normalisasi_tanggung_jawab['layak'] = normalisasi($kolom_tanggung_jawab['layak']);
$normalisasi_inisiatif['layak'] = normalisasi($kolom_inisiatif['layak']);
$normalisasi_kejujuran['layak'] = normalisasi($kolom_kejujuran['layak']);
$normalisasi_absensi['layak'] = normalisasi($kolom_absensi['layak']);

$normalisasi_mutu_kerja['tidak_layak'] = normalisasi($kolom_mutu_kerja['tidak_layak']);
$normalisasi_tanggung_jawab['tidak_layak'] = normalisasi($kolom_tanggung_jawab['tidak_layak']);
$normalisasi_inisiatif['tidak_layak'] = normalisasi($kolom_inisiatif['tidak_layak']);
$normalisasi_kejujuran['tidak_layak'] = normalisasi($kolom_kejujuran['tidak_layak']);
$normalisasi_absensi['tidak_layak'] = normalisasi($kolom_absensi['tidak_layak']);
$karyawan_moora = [];
$i=1;
foreach($hasil_k_means['layak'] as $k){
    $karyawan_moora['layak'][$i]['nama'] = $k['nama'];
    $karyawan_moora['layak'][$i]['kode'] = $k['kode'];
    $karyawan_moora['layak'][$i]['mutu_kerja'] = $normalisasi_mutu_kerja['layak']['data'][$i];
    $karyawan_moora['layak'][$i]['tanggung_jawab'] = $normalisasi_tanggung_jawab['layak']['data'][$i];
    $karyawan_moora['layak'][$i]['inisiatif'] = $normalisasi_inisiatif['layak']['data'][$i];
    $karyawan_moora['layak'][$i]['kejujuran'] = $normalisasi_kejujuran['layak']['data'][$i];
    $karyawan_moora['layak'][$i]['absensi'] = $normalisasi_absensi['layak']['data'][$i];
    $i++;
}
$i=1;
foreach($hasil_k_means['tidak_layak'] as $k){
    $karyawan_moora['tidak_layak'][$i]['nama'] = $k['nama'];
    $karyawan_moora['tidak_layak'][$i]['kode'] = $k['kode'];
    $karyawan_moora['tidak_layak'][$i]['mutu_kerja'] = $normalisasi_mutu_kerja['tidak_layak']['data'][$i];
    $karyawan_moora['tidak_layak'][$i]['tanggung_jawab'] = $normalisasi_tanggung_jawab['tidak_layak']['data'][$i];
    $karyawan_moora['tidak_layak'][$i]['inisiatif'] = $normalisasi_inisiatif['tidak_layak']['data'][$i];
    $karyawan_moora['tidak_layak'][$i]['kejujuran'] = $normalisasi_kejujuran['tidak_layak']['data'][$i];
    $karyawan_moora['tidak_layak'][$i]['absensi'] = $normalisasi_absensi['tidak_layak']['data'][$i];
    $i++;
}
$optimasi = optimasi($karyawan_moora);


usort($optimasi['layak'], function($a, $b) {
    return $a['optimasi'] <= $b['optimasi'];
});

usort($optimasi['tidak_layak'], function($a, $b) {
    return $a['optimasi'] <= $b['optimasi'];
});

dd($optimasi);
?>