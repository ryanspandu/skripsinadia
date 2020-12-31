<?php 
include 'k-means.php';
// include 'moora.php';

// dd($k_means['hasil']);
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
// dd($hasil_k_means);
?>
<h3 class="mb-3" style="color:rgb(85, 103, 117);">Data Karyawan Layak K-Means</h3><table class="table table-primary">
    <thead class="">
        <tr>
        <th scope="col">No.</th>
        <th scope="col">Kode</th>
        <th scope="col" colspan="3">Nama</th>
        <th scope="col">Mutu Kerja</th>
        <th scope="col">Tanggung Jawab</th>
        <th scope="col">Inisiatif</th>
        <th scope="col">Kejujuran</th>
        <th scope="col">Absensi</th>
        </tr>
    </thead>
</table>

<div style="max-height: 438px; overflow-y: scroll;">
    <table class="table table-light">
        <thead class="d-none">
            <tr>
            <th scope="col">No.</th>
            <th scope="col">Kode</th>
            <th scope="col" colspan="3">Nama</th>
            <th scope="col">Mutu Kerja</th>
            <th scope="col">Tanggung Jawab</th>
            <th scope="col">Inisiatif</th>
            <th scope="col">Kejujuran</th>
            <th scope="col">Absensi</th>
            </tr>
        </thead>
        <tbody class="table-data">
        <?php
        $i=1;
            foreach($hasil_k_means['layak'] as $d){ 
        ?>
            <tr>
            <th scope="row"><?php echo $i++; ?></th>
            <td><?php echo $d['kode'] ?></td>
            <td colspan="3" id="nama<?php echo $j++; ?>"><?php echo $d['nama']; ?></td>
            <td><?php echo $d['mutu_kerja']; ?></td>
            <td><?php echo $d['tanggung_jawab']; ?></td>
            <td><?php echo $d['inisiatif']; ?></td>
            <td><?php echo $d['kejujuran']; ?></td>
            <td><?php echo $d['absensi']; ?></td>
            </tr>
            <?php } ?>
        </tbody>
        </table>
</div>


<h3 class="mb-3 mt-5" style="color:rgb(85, 103, 117);">Data Karyawan Tidak Layak K-Means</h3><table class="table table-primary">
    <thead class="">
        <tr>
        <th scope="col">No.</th>
        <th scope="col">Kode</th>
        <th scope="col" colspan="3">Nama</th>
        <th scope="col">Mutu Kerja</th>
        <th scope="col">Tanggung Jawab</th>
        <th scope="col">Inisiatif</th>
        <th scope="col">Kejujuran</th>
        <th scope="col">Absensi</th>
        </tr>
    </thead>
</table>

<div style="max-height: 438px; overflow-y: scroll;">
    <table class="table table-light">
        <thead class="d-none">
            <tr>
            <th scope="col">No.</th>
            <th scope="col">Kode</th>
            <th scope="col" colspan="3">Nama</th>
            <th scope="col">Mutu Kerja</th>
            <th scope="col">Tanggung Jawab</th>
            <th scope="col">Inisiatif</th>
            <th scope="col">Kejujuran</th>
            <th scope="col">Absensi</th>
            </tr>
        </thead>
        <tbody class="table-data">
        <?php
        $i=1;
            foreach($hasil_k_means['tidak_layak'] as $d){ 
        ?>
            <tr>
            <th scope="row"><?php echo $i++; ?></th>
            <td><?php echo $d['kode'] ?></td>
            <td colspan="3" id="nama<?php echo $j++; ?>"><?php echo $d['nama']; ?></td>
            <td><?php echo $d['mutu_kerja']; ?></td>
            <td><?php echo $d['tanggung_jawab']; ?></td>
            <td><?php echo $d['inisiatif']; ?></td>
            <td><?php echo $d['kejujuran']; ?></td>
            <td><?php echo $d['absensi']; ?></td>
            </tr>
            <?php } ?>
        </tbody>
        </table>
</div>
