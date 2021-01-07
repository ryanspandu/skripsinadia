<?php 
error_reporting(0);
include '../../conn.php';
include '../datakaryawan.php';
include '../dd.php';
// Pencarian iterasi 1
for($i=1; $i<=100; $i++){
    $hasil_layak = sqrt(
        pow($layak['mutu_kerja']-$karyawan[$i]['mutu_kerja'],2)+
        pow($layak['tanggung_jawab']-$karyawan[$i]['tanggung_jawab'],2)+
        pow($layak['inisiatif']-$karyawan[$i]['inisiatif'],2)+
        pow($layak['kejujuran']-$karyawan[$i]['kejujuran'],2)+
        pow($layak['absensi']-$karyawan[$i]['absensi'],2)
    );

    $hasil_tidak_layak = sqrt(
        pow($tidak_layak['mutu_kerja']-$karyawan[$i]['mutu_kerja'],2)+
        pow($tidak_layak['tanggung_jawab']-$karyawan[$i]['tanggung_jawab'],2)+
        pow($tidak_layak['inisiatif']-$karyawan[$i]['inisiatif'],2)+
        pow($tidak_layak['kejujuran']-$karyawan[$i]['kejujuran'],2)+
        pow($tidak_layak['absensi']-$karyawan[$i]['absensi'],2)
    );

    $iterasi1['text']['layak'][$i] = $karyawan[$i]['kode'].' = '.'('.$karyawan[$i]['mutu_kerja'].' - '.$layak['mutu_kerja'].')'.'&sup2;'.' + '.'('.$karyawan[$i]['tanggung_jawab'].' - '.$layak['tanggung_jawab'].')'.'&sup2;'.' + '.'('.$karyawan[$i]['inisiatif'].' - '.$layak['inisiatif'].')'.'&sup2;'.' + '.'('.$karyawan[$i]['kejujuran'].' - '.$layak['kejujuran'].')'.'&sup2;'.' + '.'('.$karyawan[$i]['absensi'].' - '.$layak['absensi'].')'.'&sup2;'.' = '.$hasil_layak;

    $iterasi1['text']['tidak_layak'][$i] = $karyawan[$i]['kode'].' = '.'('.$karyawan[$i]['mutu_kerja'].' - '.$tidak_layak['mutu_kerja'].')'.'&sup2;'.' + '.'('.$karyawan[$i]['tanggung_jawab'].' - '.$tidak_layak['tanggung_jawab'].')'.'&sup2;'.' + '.'('.$karyawan[$i]['inisiatif'].' - '.$tidak_layak['inisiatif'].')'.'&sup2;'.' + '.'('.$karyawan[$i]['kejujuran'].' - '.$tidak_layak['kejujuran'].')'.'&sup2;'.' + '.'('.$karyawan[$i]['absensi'].' - '.$tidak_layak['absensi'].')'.'&sup2;'.' = '.$hasil_tidak_layak;

    if(min($hasil_layak, $hasil_tidak_layak) == $hasil_layak){
        $iterasi1['hasil'][$i]['klaster'] = 'layak';
        $iterasi1['data_layak']['mutu_kerja'][$i] = $karyawan[$i]['mutu_kerja'];
        $iterasi1['data_layak']['tanggung_jawab'][$i] = $karyawan[$i]['tanggung_jawab'];
        $iterasi1['data_layak']['inisiatif'][$i] = $karyawan[$i]['inisiatif'];
        $iterasi1['data_layak']['kejujuran'][$i] = $karyawan[$i]['kejujuran'];
        $iterasi1['data_layak']['absensi'][$i] = $karyawan[$i]['absensi'];
    }else{
        $iterasi1['hasil'][$i]['klaster'] = 'tidak layak';
        $iterasi1['data_tidak_layak']['mutu_kerja'][$i] = $karyawan[$i]['mutu_kerja'];
        $iterasi1['data_tidak_layak']['tanggung_jawab'][$i] = $karyawan[$i]['tanggung_jawab'];
        $iterasi1['data_tidak_layak']['inisiatif'][$i] = $karyawan[$i]['inisiatif'];
        $iterasi1['data_tidak_layak']['kejujuran'][$i] = $karyawan[$i]['kejujuran'];
        $iterasi1['data_tidak_layak']['absensi'][$i] = $karyawan[$i]['absensi'];
    }
}

// Pencarian iterasi 2 dan seterusnya 
$i=1;
foreach($iterasi1['data_layak']['mutu_kerja'] as $h){
    $layaks['mutu_kerja'][$i] = $h;
    $i++;
}
$i=1;
foreach($iterasi1['data_layak']['tanggung_jawab'] as $h){
    $layaks['tanggung_jawab'][$i] = $h;
    $i++;
}
$i=1;
foreach($iterasi1['data_layak']['inisiatif'] as $h){
    $layaks['inisiatif'][$i] = $h;
    $i++;
}
$i=1;
foreach($iterasi1['data_layak']['kejujuran'] as $h){
    $layaks['kejujuran'][$i] = $h;
    $i++;
}
$i=1;
foreach($iterasi1['data_layak']['absensi'] as $h){
    $layaks['absensi'][$i] = $h;
    $i++;
}
// tidak layaks 
$i=1;
foreach($iterasi1['data_tidak_layak']['mutu_kerja'] as $h){
    $tidak_layaks['mutu_kerja'][$i] = $h;
    $i++;
}
$i=1;
foreach($iterasi1['data_tidak_layak']['tanggung_jawab'] as $h){
    $tidak_layaks['tanggung_jawab'][$i] = $h;
    $i++;
}
$i=1;
foreach($iterasi1['data_tidak_layak']['inisiatif'] as $h){
    $tidak_layaks['inisiatif'][$i] = $h;
    $i++;
}
$i=1;
foreach($iterasi1['data_tidak_layak']['kejujuran'] as $h){
    $tidak_layaks['kejujuran'][$i] = $h;
    $i++;
}
$i=1;
foreach($iterasi1['data_tidak_layak']['absensi'] as $h){
    $tidak_layaks['absensi'][$i] = $h;
    $i++;
}
// dd($layaks);
for ($i = 1; $i <= 19; $i++) {
    $layak_baru['mutu_kerja'] = array_sum($layaks['mutu_kerja'])/count($layaks['mutu_kerja']);
    $layak_baru['tanggung_jawab'] = array_sum($layaks['tanggung_jawab'])/count($layaks['tanggung_jawab']);
    $layak_baru['inisiatif'] = array_sum($layaks['inisiatif'])/count($layaks['inisiatif']);
    $layak_baru['kejujuran'] = array_sum($layaks['kejujuran'])/count($layaks['kejujuran']);
    $layak_baru['absensi'] = array_sum($layaks['absensi'])/count($layaks['absensi']);

    $tidak_layak_baru['mutu_kerja'] = array_sum($tidak_layaks['mutu_kerja'])/count($tidak_layaks['mutu_kerja']);
    $tidak_layak_baru['tanggung_jawab'] = array_sum($tidak_layaks['tanggung_jawab'])/count($tidak_layaks['tanggung_jawab']);
    $tidak_layak_baru['inisiatif'] = array_sum($tidak_layaks['inisiatif'])/count($tidak_layaks['inisiatif']);
    $tidak_layak_baru['kejujuran'] = array_sum($tidak_layaks['kejujuran'])/count($tidak_layaks['kejujuran']);
    $tidak_layak_baru['absensi'] = array_sum($tidak_layaks['absensi'])/count($tidak_layaks['absensi']);
    for ($j = 1; $j <= 100; $j++) {
        $hasil_layaks = sqrt(
            pow($layak_baru['mutu_kerja']-$karyawan[$j]['mutu_kerja'],2)+
            pow($layak_baru['tanggung_jawab']-$karyawan[$j]['tanggung_jawab'],2)+
            pow($layak_baru['inisiatif']-$karyawan[$j]['inisiatif'],2)+
            pow($layak_baru['kejujuran']-$karyawan[$j]['kejujuran'],2)+
            pow($layak_baru['absensi']-$karyawan[$j]['absensi'],2)
        );
    
        $hasil_tidak_layaks = sqrt(
            pow($tidak_layak_baru['mutu_kerja']-$karyawan[$j]['mutu_kerja'],2)+
            pow($tidak_layak_baru['tanggung_jawab']-$karyawan[$j]['tanggung_jawab'],2)+
            pow($tidak_layak_baru['inisiatif']-$karyawan[$j]['inisiatif'],2)+
            pow($tidak_layak_baru['kejujuran']-$karyawan[$j]['kejujuran'],2)+
            pow($tidak_layak_baru['absensi']-$karyawan[$j]['absensi'],2)
        );

        $iterasi[$i]['text']['layak'][$j] = $karyawan[$j]['kode'].' = '.'('.$karyawan[$j]['mutu_kerja'].' - '.$layak['mutu_kerja'].')'.'&sup2;'.' + '.'('.$karyawan[$j]['tanggung_jawab'].' - '.$layak['tanggung_jawab'].')'.'&sup2;'.' + '.'('.$karyawan[$j]['inisiatif'].' - '.$layak['inisiatif'].')'.'&sup2;'.' + '.'('.$karyawan[$j]['kejujuran'].' - '.$layak['kejujuran'].')'.'&sup2;'.' + '.'('.$karyawan[$j]['absensi'].' - '.$layak['absensi'].')'.'&sup2;'.' = '.$hasil_layaks;

        $iterasi[$i]['text']['tidak_layak'][$j] = $karyawan[$j]['kode'].' = '.'('.$karyawan[$j]['mutu_kerja'].' - '.$tidak_layak['mutu_kerja'].')'.'&sup2;'.' + '.'('.$karyawan[$i]['tanggung_jawab'].' - '.$tidak_layak['tanggung_jawab'].')'.'&sup2;'.' + '.'('.$karyawan[$i]['inisiatif'].' - '.$tidak_layak['inisiatif'].')'.'&sup2;'.' + '.'('.$karyawan[$i]['kejujuran'].' - '.$tidak_layak['kejujuran'].')'.'&sup2;'.' + '.'('.$karyawan[$i]['absensi'].' - '.$tidak_layak['absensi'].')'.'&sup2;'.' = '.$hasil_tidak_layaks;

        if(min($hasil_layaks, $hasil_tidak_layaks) == $hasil_layaks){
            // $iterasi[$i]['hasil'][$j]['klaster'] = 'layak';
            $iterasi[$i]['data_layak']['mutu_kerja'][$j] = $karyawan[$j]['mutu_kerja'];
            $iterasi[$i]['data_layak']['tanggung_jawab'][$j] = $karyawan[$j]['tanggung_jawab'];
            $iterasi[$i]['data_layak']['inisiatif'][$j] = $karyawan[$j]['inisiatif'];
            $iterasi[$i]['data_layak']['kejujuran'][$j] = $karyawan[$j]['kejujuran'];
            $iterasi[$i]['data_layak']['absensi'][$j] = $karyawan[$j]['absensi'];
        }else{
            // $iterasi[$i]['hasil'][$j]['klaster'] = 'tidak layak';
            $iterasi[$i]['data_tidak_layak']['mutu_kerja'][$j] = $karyawan[$j]['mutu_kerja'];
            $iterasi[$i]['data_tidak_layak']['tanggung_jawab'][$j] = $karyawan[$j]['tanggung_jawab'];
            $iterasi[$i]['data_tidak_layak']['inisiatif'][$j] = $karyawan[$j]['inisiatif'];
            $iterasi[$i]['data_tidak_layak']['kejujuran'][$j] = $karyawan[$j]['kejujuran'];
            $iterasi[$i]['data_tidak_layak']['absensi'][$j] = $karyawan[$j]['absensi'];
        }
    }
    $k=1;
    foreach($iterasi[$i]['data_layak']['mutu_kerja'] as $h){
        $layaks['mutu_kerja'][$k] = $h;
        $k++;
    }
    $k=1;
    foreach($iterasi[$i]['data_layak']['tanggung_jawab'] as $h){
        $layaks['tanggung_jawab'][$k] = $h;
        $k++;
    }
    $k=1;
    foreach($iterasi[$i]['data_layak']['inisiatif'] as $h){
        $layaks['inisiatif'][$k] = $h;
        $k++;
    }
    $k=1;
    foreach($iterasi[$i]['data_layak']['kejujuran'] as $h){
        $layaks['kejujuran'][$k] = $h;
        $k++;
    }
    $k=1;
    foreach($iterasi[$i]['data_layak']['absensi'] as $h){
        $layaks['absensi'][$k] = $h;
        $k++;
    }
    // tidak layaks 
    $k=1;
    foreach($iterasi[$i]['data_tidak_layak']['mutu_kerja'] as $h){
        $tidak_layaks['mutu_kerja'][$k] = $h;
        $k++;
    }
    $k=1;
    foreach($iterasi[$i]['data_tidak_layak']['tanggung_jawab'] as $h){
        $tidak_layaks['tanggung_jawab'][$k] = $h;
        $k++;
    }
    $k=1;
    foreach($iterasi[$i]['data_tidak_layak']['inisiatif'] as $h){
        $tidak_layaks['inisiatif'][$k] = $h;
        $k++;
    }
    $k=1;
    foreach($iterasi[$i]['data_tidak_layak']['kejujuran'] as $h){
        $tidak_layaks['kejujuran'][$k] = $h;
        $k++;
    }
    $k=1;
    foreach($iterasi[$i]['data_tidak_layak']['absensi'] as $h){
        $tidak_layaks['absensi'][$k] = $h;
        $k++;
    }
}

// dd($iterasi);

echo 'Iterasi 1 Layak';
echo '<br>';
echo '<br>';
for($i=1; $i<=5; $i++){
    echo $iterasi1['text']['layak'][$i];
    echo '<br>';
}
echo '<br>';
echo 'Iterasi 1 Tidak Layak';
echo '<br>';
echo '<br>';
for($i=1; $i<=5; $i++){
    echo $iterasi1['text']['tidak_layak'][$i];
    echo '<br>';
}

// perhitungan 2 - dan seterusnya 
$it=2;
for($i=1; $i<=10; $i++){
    echo '<br>';
    echo 'Iterasi '.$it.' Layak';
    echo '<br>';
    echo '<br>';
    for($k=1; $k<=5; $k++){
        echo $iterasi[$i]['text']['layak'][$k];
        echo '<br>';
    }
    echo '<br>';
    echo 'Iterasi '.$it.' Tidak Layak';
    echo '<br>';
    echo '<br>';
    for($k=1; $k<=5; $k++){
        echo $iterasi[$i]['text']['tidak_layak'][$k];
        echo '<br>';
    }
    $it++;
}


?>