<?php 
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
?>