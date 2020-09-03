<!DOCTYPE html> 
<html>
<head>
    <link href="style.css"
      rel="stylesheet">
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
        <h2 class="heading">Input data</h2>
        <div class="row mt-3">
            <div class="col-12">
                <form class="d-flex flex-column" method="POST" action="../perhitungan/tambah.php">
                    <div class="d-flex flex-row">
                        <input name="kode" type="text" placeholder="Kode" class="form-control mr-2" style="max-width: 140px;">
                        <input name="nama" type="text" placeholder="Nama" class="form-control mr-2" style="max-width: 340px;">
                    </div>
                    <div class="d-flex flex-row mt-3">
                        <input name="mutu_kerja" type="number" placeholder="Mutu Kerja" class="form-control mr-2">
                        <input name="tanggung_jawab" type="number" placeholder="Tanggung Jawab" class="form-control mr-2">
                        <input name="inisiatif" type="number" placeholder="Inisiatif" class="form-control mr-2">
                        <input name="kejujuran" type="number" placeholder="Kejujuran" class="form-control mr-2">
                        <input name="absensi" type="number" placeholder="Absensi" class="form-control mr-2">
                        <input type="submit" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12" style="max-height: 338px; overflow-y: scroll;">
                <table class="table table-dark">
                    <thead>
                      <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Kode</th>
                        <th scope="col" colspan="3">Nama</th>
                        <th scope="col">Mutu Kerja</th>
                        <th scope="col">Tanggung Jawab</th>
                        <th scope="col">Inisiatif</th>
                        <th scope="col">Kejujuran</th>
                        <th scope="col">Absensi</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Hapus</th>
                      </tr>
                    </thead>
                    <tbody class="table-data">
                    <?php
                        $data = mysqli_query($koneksi,"select * from pegawai");
                        $i = 1;
                        while($d = mysqli_fetch_array($data)){ 
                    ?>
                      <tr>
                        <th scope="row"><?php echo $i++; ?></th>
                        <td><?php echo $d['kode']; ?></td>
                        <td colspan="3"><?php echo $d['nama']; ?></td>
                        <td><?php echo $d['mutu_kerja']; ?></td>
                        <td><?php echo $d['tanggung_jawab']; ?></td>
                        <td><?php echo $d['inisiatif']; ?></td>
                        <td><?php echo $d['kejujuran']; ?></td>
                        <td><?php echo $d['absensi']; ?></td>
                        <td>
                            <a href="edit.php?kode=<?php echo $d['kode']; ?>">
                                <i class="material-icons">edit</i>
                            </a>
                        </td>
                        <td>
                            <a href="../perhitungan/hapus.php?kode=<?php echo $d['kode']; ?>">
                                <i class="material-icons text-danger">delete</i>
                            </a>
                        </td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
            </div>
            <div class="col-12 mt-3">
                <button class="moora-btn btn-lg btn-success float-right">JALANKAN MOORA</button>
            </div>
        </div>
        
        <div id="moora-data" class="row mt-4">
        
        </div>

        <div id="moora-table" class="mt-2 mb-5">
        
        </div>
    </div>
</body>
<script src="perhitungan.js"></script>
</html>