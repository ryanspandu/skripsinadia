<?php 
include 'k-means.php';
include 'moora.php';

// dd($k_means['hasil']);
// dd($hasil_k_means);
?>
<h4 class="mb-3" style="color:rgb(85, 103, 117);">Klastering Layak K-Means</h4><table class="table table-warning">
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


<h4 class="mb-3 mt-5" style="color:rgb(85, 103, 117);">Klastering Tidak Layak K-Means</h4><table class="table table-warning">
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
<div class="d-flex flex-row justify-content-center mt-3">
    <img src="../assets/img/kmeans.png"/>
</div>
<h4 class="mb-3 mt-5" style="color:rgb(85, 103, 117);">Perangkingan Layak & Tidak Layak Moora</h4>
<p class="text-danger mb-1" style="font-style: italic;">*info</p>
<p class="text-danger mb-0" style="font-style: italic;">Grade A : Bonus insentif 50% dari gaji</p>
<p class="text-danger mb-0" style="font-style: italic;">Grade B : Bonus insentif 25% dari gaji</p>
<p class="text-danger" style="font-style: italic;">Grade C : Bonus insentif 10% dari gaji</p>
<table class="table table-primary">
    <thead class="">
        <tr>
        <th scope="col">No.</th>
        <th scope="col">Kode</th>
        <th scope="col" colspan="3">Nama</th>
        <th scope="col">Nilai Optimasi</th>
        <th scope="col">Klaster</th>
        </tr>
    </thead>
    <tbody style="opacity: 0; height: 10px; overflow: hidden;">
        <tr>
            <th scope="row">100</th>
            <td>A25</td>
            <td colspan="3" id="">aedfresrrestrestrtrewtwretrtw4res</td>
            <td>0.76377625708797</td>
            <td>Layak</td>
        </tr>
    </tbody>
</table>

<div style="max-height: 438px; overflow-y: scroll;">
    <table class="table table-light">
        <thead class="d-none">
            <tr>
            <th scope="col">Rangking</th>
            <th scope="col">Kode</th>
            <th scope="col" colspan="3">Nama</th>
            <th scope="col">Nilai Optimasi</th>
            <th scope="col">Klaster</th>
            </tr>
        </thead>
        <tbody class="table-data">
        <?php
        // echo count($hasil_moora['layak'])/3;
        $gradeA = count($hasil_moora['layak'])/3;
        $gradeB = $gradeA*2;
        // $gradeC = $gradeA*3;
        // echo $gradeA.$gradeB;
        $i=1;
            foreach($hasil_moora['layak'] as $d){ 
        ?>
            <tr>
            <th scope="row"><?php echo $i++; ?></th>
            <td><?php echo $d['kode'] ?></td>
            <td colspan="3" id="nama<?php echo $j++; ?>"><?php echo $d['nama']; ?></td>
            <td><?php echo $d['optimasi']; ?></td>
            <td class="text-success font-weight-bold"><?php echo 'Layak'; ?><?php if($i <= $gradeA){ echo ' <span class="text-dark">(Grade A)</span>'; }elseif($i >= $gradeA && $i <= $gradeB){ echo ' <span class="text-dark">(Grade B)</span>'; }else{ echo ' <span class="text-dark">(Grade C)</span>'; } ?></td>
            </tr>
            <?php } ?>

        <?php
            foreach($hasil_moora['tidak_layak'] as $d){ 
        ?>
            <tr>
            <th scope="row"><?php echo $i++; ?></th>
            <td><?php echo $d['kode'] ?></td>
            <td colspan="3" id="nama<?php echo $j++; ?>"><?php echo $d['nama']; ?></td>
            <td><?php echo $d['optimasi']; ?></td>
            <td class="text-danger font-weight-bold"><?php echo 'Tidak Layak'; ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
