<?php 
include '../conn.php';
include 'datakaryawan.php';
include 'dd.php';

// dd($karyawan);

function jarak_klaster($layak, $tidak_layak, $karyawan){

    for($i=1; $i<=count($karyawan); $i++){
        // array cluster layak
        $jarak_klaster['hasil'][$i]['kode'] = $karyawan[$i]['kode'];
        $jarak_klaster['hasil'][$i]['nama'] = $karyawan[$i]['nama'];
        $jarak_klaster['hasil'][$i]['layak'] = sqrt(
            pow($layak['mutu_kerja']-$karyawan[$i]['mutu_kerja'],2)+
            pow($layak['tanggung_jawab']-$karyawan[$i]['tanggung_jawab'],2)+
            pow($layak['inisiatif']-$karyawan[$i]['inisiatif'],2)+
            pow($layak['kejujuran']-$karyawan[$i]['kejujuran'],2)+
            pow($layak['absensi']-$karyawan[$i]['absensi'],2)
        );
        // array cluster tidak layak
        // $jarak_klaster['hasil'][$i]['nama'] = $karyawan[$i]['nama'];
        $jarak_klaster['hasil'][$i]['tidak_layak'] = sqrt(
            pow($tidak_layak['mutu_kerja']-$karyawan[$i]['mutu_kerja'],2)+
            pow($tidak_layak['tanggung_jawab']-$karyawan[$i]['tanggung_jawab'],2)+
            pow($tidak_layak['inisiatif']-$karyawan[$i]['inisiatif'],2)+
            pow($tidak_layak['kejujuran']-$karyawan[$i]['kejujuran'],2)+
            pow($tidak_layak['absensi']-$karyawan[$i]['absensi'],2)
        );
        // penentuan cluster 
        if(min($jarak_klaster['hasil'][$i]['layak'], $jarak_klaster['hasil'][$i]['tidak_layak'])==$jarak_klaster['hasil'][$i]['layak']){
            $jarak_klaster['hasil'][$i]['klaster'] = 'layak';
            $jarak_klaster['data_layak']['mutu_kerja'][$i] = $karyawan[$i]['mutu_kerja'];
            $jarak_klaster['data_layak']['tanggung_jawab'][$i] = $karyawan[$i]['tanggung_jawab'];
            $jarak_klaster['data_layak']['inisiatif'][$i] = $karyawan[$i]['inisiatif'];
            $jarak_klaster['data_layak']['kejujuran'][$i] = $karyawan[$i]['kejujuran'];
            $jarak_klaster['data_layak']['absensi'][$i] = $karyawan[$i]['absensi'];
        }else{
            $jarak_klaster['hasil'][$i]['klaster'] = 'tidak layak';
            $jarak_klaster['data_tidak_layak']['mutu_kerja'][$i] = $karyawan[$i]['mutu_kerja'];
            $jarak_klaster['data_tidak_layak']['tanggung_jawab'][$i] = $karyawan[$i]['tanggung_jawab'];
            $jarak_klaster['data_tidak_layak']['inisiatif'][$i] = $karyawan[$i]['inisiatif'];
            $jarak_klaster['data_tidak_layak']['kejujuran'][$i] = $karyawan[$i]['kejujuran'];
            $jarak_klaster['data_tidak_layak']['absensi'][$i] = $karyawan[$i]['absensi'];
        }
    }

    return $jarak_klaster;
}


$k_means = [];

for ($i = 1; $i <= 20; $i++) {
    $k_means['iterasi'][$i] = $i;
    $t=1;
    foreach(jarak_klaster($layak, $tidak_layak, $karyawan)['hasil'] as $h){
        $k_means['hasil'][$t]['kode'] = $h['kode'];
        $k_means['hasil'][$t]['nama'] = $h['nama'];
        $k_means['hasil'][$t]['layak'] = $h['layak'];
        $k_means['hasil'][$t]['tidak_layak'] = $h['tidak_layak'];
        $k_means['hasil'][$t]['klaster'] = $h['klaster'];
        $k_means['data']['layak'][$i] = $h['layak'];
        // if($k_means['hasil'][$t]['klaster'] == 'layak'){
        // }else{
        // }
        $k_means['data']['tidak_layak'][$i] = $h['tidak_layak'];
        $t++;
    }
    // data layak mutu kerja
    $t=1;
    foreach(jarak_klaster($layak, $tidak_layak, $karyawan)['data_layak']['mutu_kerja'] as $h){
        $k_means['data_layak']['mutu_kerja'][$t] = $h;
        $t++;
    }
    // data layak tanggung jawab
    $t=1;
    foreach(jarak_klaster($layak, $tidak_layak, $karyawan)['data_layak']['tanggung_jawab'] as $h){
        $k_means['data_layak']['tanggung_jawab'][$t] = $h;
        $t++;
    }
    // data layak inisiatif
    $t=1;
    foreach(jarak_klaster($layak, $tidak_layak, $karyawan)['data_layak']['inisiatif'] as $h){
        $k_means['data_layak']['inisiatif'][$t] = $h;
        $t++;
    }
    // data layak kejujuran
    $t=1;
    foreach(jarak_klaster($layak, $tidak_layak, $karyawan)['data_layak']['kejujuran'] as $h){
        $k_means['data_layak']['kejujuran'][$t] = $h;
        $t++;
    }
    // data layak absensi
    $t=1;
    foreach(jarak_klaster($layak, $tidak_layak, $karyawan)['data_layak']['absensi'] as $h){
        $k_means['data_layak']['absensi'][$t] = $h;
        $t++;
    }
    // data tidak layak mutu kerja
    $t=1;
    foreach(jarak_klaster($layak, $tidak_layak, $karyawan)['data_tidak_layak']['mutu_kerja'] as $h){
        $k_means['data_tidak_layak']['mutu_kerja'][$t] = $h;
        $t++;
    }
    // data tidak layak tanggung jawab
    $t=1;
    foreach(jarak_klaster($layak, $tidak_layak, $karyawan)['data_tidak_layak']['tanggung_jawab'] as $h){
        $k_means['data_tidak_layak']['tanggung_jawab'][$t] = $h;
        $t++;
    }
    // data tidak layak inisiatif
    $t=1;
    foreach(jarak_klaster($layak, $tidak_layak, $karyawan)['data_tidak_layak']['inisiatif'] as $h){
        $k_means['data_tidak_layak']['inisiatif'][$t] = $h;
        $t++;
    }
    // data tidak layak kejujuran
    $t=1;
    foreach(jarak_klaster($layak, $tidak_layak, $karyawan)['data_tidak_layak']['kejujuran'] as $h){
        $k_means['data_tidak_layak']['kejujuran'][$t] = $h;
        $t++;
    }
    // data tidak layak absensi
    $t=1;
    foreach(jarak_klaster($layak, $tidak_layak, $karyawan)['data_tidak_layak']['absensi'] as $h){
        $k_means['data_tidak_layak']['absensi'][$t] = $h;
        $t++;
    }
    
    $layak['mutu_kerja'] = array_sum($k_means['data_layak']['mutu_kerja'])/count($k_means['data_layak']['mutu_kerja']);
    $layak['tanggung_jawab'] = array_sum($k_means['data_layak']['tanggung_jawab'])/count($k_means['data_layak']['tanggung_jawab']);
    $layak['inisiatif'] = array_sum($k_means['data_layak']['inisiatif'])/count($k_means['data_layak']['inisiatif']);
    $layak['kejujuran'] = array_sum($k_means['data_layak']['kejujuran'])/count($k_means['data_layak']['kejujuran']);
    $layak['absensi'] = array_sum($k_means['data_layak']['absensi'])/count($k_means['data_layak']['absensi']);

    $tidak_layak['mutu_kerja'] = array_sum($k_means['data_tidak_layak']['mutu_kerja'])/count($k_means['data_tidak_layak']['mutu_kerja']);
    $tidak_layak['tanggung_jawab'] = array_sum($k_means['data_tidak_layak']['tanggung_jawab'])/count($k_means['data_tidak_layak']['tanggung_jawab']);
    $tidak_layak['inisiatif'] = array_sum($k_means['data_tidak_layak']['inisiatif'])/count($k_means['data_tidak_layak']['inisiatif']);
    $tidak_layak['kejujuran'] = array_sum($k_means['data_tidak_layak']['kejujuran'])/count($k_means['data_tidak_layak']['kejujuran']);
    $tidak_layak['absensi'] = array_sum($k_means['data_tidak_layak']['absensi'])/count($k_means['data_tidak_layak']['absensi']);

    if($i>2){
        if($i>count($karyawan)){
            $layak_sebelumnya = $k_means['data']['layak'][count($karyawan)-1];
            $layak_sekarang = $k_means['data']['layak'][count($karyawan)];
            $tidak_layak_sebelumnya = $k_means['data']['tidak_layak'][count($karyawan)-1];
            $tidak_layak_sekarang = $k_means['data']['tidak_layak'][count($karyawan)];
        }
        $layak_sebelumnya = $k_means['data']['layak'][$i-1];
        $layak_sekarang = $k_means['data']['layak'][$i];
        $tidak_layak_sebelumnya = $k_means['data']['tidak_layak'][$i-1];
        $tidak_layak_sekarang = $k_means['data']['tidak_layak'][$i];
    }else{
        $layak_sebelumnya = false;
        $layak_sekarang = true;
        $tidak_layak_sebelumnya = false;
        $tidak_layak_sekarang = true;
    }
    if ($layak_sebelumnya == $layak_sekarang && $tidak_layak_sebelumnya == $tidak_layak_sekarang) {
      break;
    }else{
        continue;
    }
}

// dd($k_means);

$hasil_k_means = [];
$i=1;
$j=1;
foreach($k_means['hasil'] as $k){
    if($k['klaster']=='layak'){
        $hasil_k_means['layak'][$i]['kode'] = $k['kode'];
        $hasil_k_means['layak'][$i]['nama'] = $k['nama'];
        $hasil_k_means['layak'][$i]['mutu_kerja'] = $karyawan[intval(trim(str_replace('A','',$k['kode'])))]['mutu_kerja'];
        $hasil_k_means['layak'][$i]['tanggung_jawab'] = $karyawan[intval(trim(str_replace('A','',$k['kode'])))]['tanggung_jawab'];
        $hasil_k_means['layak'][$i]['inisiatif'] = $karyawan[intval(trim(str_replace('A','',$k['kode'])))]['inisiatif'];
        $hasil_k_means['layak'][$i]['kejujuran'] = $karyawan[intval(trim(str_replace('A','',$k['kode'])))]['kejujuran'];
        $hasil_k_means['layak'][$i]['absensi'] = $karyawan[intval(trim(str_replace('A','',$k['kode'])))]['absensi'];
        $i++;
    }
    if($k['klaster']=='tidak layak'){
        $hasil_k_means['tidak_layak'][$j]['kode'] = $k['kode'];
        $hasil_k_means['tidak_layak'][$j]['nama'] = $k['nama'];
        $hasil_k_means['tidak_layak'][$j]['mutu_kerja'] = $karyawan[intval(trim(str_replace('A','',$k['kode'])))]['mutu_kerja'];
        $hasil_k_means['tidak_layak'][$j]['tanggung_jawab'] = $karyawan[intval(trim(str_replace('A','',$k['kode'])))]['tanggung_jawab'];
        $hasil_k_means['tidak_layak'][$j]['inisiatif'] = $karyawan[intval(trim(str_replace('A','',$k['kode'])))]['inisiatif'];
        $hasil_k_means['tidak_layak'][$j]['kejujuran'] = $karyawan[intval(trim(str_replace('A','',$k['kode'])))]['kejujuran'];
        $hasil_k_means['tidak_layak'][$j]['absensi'] = $karyawan[intval(trim(str_replace('A','',$k['kode'])))]['absensi'];
        $j++;
    }
}
?>