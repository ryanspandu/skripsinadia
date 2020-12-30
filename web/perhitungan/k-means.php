<?php 
include '../conn.php';
include 'datakaryawan.php';
include 'dd.php';

// dd($karyawan);

function jarak_klaster($layak, $tidak_layak, $karyawan){

    for($i=1; $i<=count($karyawan); $i++){
        // array cluster layak
        $jarak_klaster[$i]['nama'] = $karyawan[$i]['nama'];
        $jarak_klaster[$i]['layak'] = sqrt(
            pow($layak['mutu_kerja']-$karyawan[$i]['mutu_kerja'],2)+
            pow($layak['tanggung_jawab']-$karyawan[$i]['tanggung_jawab'],2)+
            pow($layak['inisiatif']-$karyawan[$i]['inisiatif'],2)+
            pow($layak['kejujuran']-$karyawan[$i]['kejujuran'],2)+
            pow($layak['absensi']-$karyawan[$i]['absensi'],2)
        );
        // array cluster tidak layak
        $jarak_klaster[$i]['nama'] = $karyawan[$i]['nama'];
        $jarak_klaster[$i]['tidak_layak'] = sqrt(
            pow($tidak_layak['mutu_kerja']-$karyawan[$i]['mutu_kerja'],2)+
            pow($tidak_layak['tanggung_jawab']-$karyawan[$i]['tanggung_jawab'],2)+
            pow($tidak_layak['inisiatif']-$karyawan[$i]['inisiatif'],2)+
            pow($tidak_layak['kejujuran']-$karyawan[$i]['kejujuran'],2)+
            pow($tidak_layak['absensi']-$karyawan[$i]['absensi'],2)
        );
        // penentuan cluster 
        if(min($jarak_klaster[$i]['layak'], $jarak_klaster[$i]['tidak_layak'])==$jarak_klaster[$i]['layak']){
            $jarak_klaster[$i]['klaster'] = 'layak';
        }else{
            $jarak_klaster[$i]['klaster'] = 'tidak layak';
        }
    }

    return $jarak_klaster;
}

dd(jarak_klaster($layak, $tidak_layak, $karyawan));
?>