<!DOCTYPE html> 
<html>
<head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Perhitungan</title>
</head>
<body>
    <?php include '../perhitungan/koneksi.php'; ?>
    <div class="container mt-5">
        <h2 class="heading">Ubah data</h2>
        <div class="row mt-3">
            <div class="col-12">
                <?php
                    $kode = $_GET['kode'];
                    $data = mysqli_query($koneksi,"select * from pegawai WHERE kode='$kode'");
                    $i = 1;
                    while($d = mysqli_fetch_array($data)){ 
                ?>
                <form class="d-flex flex-column" method="POST" action="../perhitungan/ubah_proses.php">
                    <div class="d-flex flex-row">
                        <input name="kode" type="text" placeholder="Kode" class="form-control mr-2" style="max-width: 140px;" value="<?php echo $d['kode']; ?>">
                        <input name="nama" type="text" placeholder="Nama" class="form-control mr-2" style="max-width: 340px;" value="<?php echo $d['nama']; ?>">
                    </div>
                    <div class="d-flex flex-row mt-3">
                        <input name="mutu_kerja" type="number" placeholder="Mutu Kerja" class="form-control mr-2" value="<?php echo $d['mutu_kerja']; ?>">
                        <input name="tanggung_jawab" type="number" placeholder="Tanggung Jawab" class="form-control mr-2" value="<?php echo $d['tanggung_jawab']; ?>">
                        <input name="inisiatif" type="number" placeholder="Inisiatif" class="form-control mr-2" value="<?php echo $d['inisiatif']; ?>">
                        <input name="kejujuran" type="number" placeholder="Kejujuran" class="form-control mr-2" value="<?php echo $d['kejujuran']; ?>">
                        <input name="absensi" type="number" placeholder="Absensi" class="form-control mr-2" value="<?php echo $d['absensi']; ?>">
                        <input type="submit" class="btn btn-primary">
                    </div>
                </form>
                    <?php } ?>
            </div>
            <div class="col-12 mt-4">
                <a href="../perhitungan/index.php">
                    <button class="btn-lg btn-secondary">KEMBALI</button>
                </a>
            </div>
        </div>
    </div>
</body>
</html>