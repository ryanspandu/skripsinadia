<?php 
include 'k-means.php';
include 'moora.php';

// dd($k_means['hasil']);
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
