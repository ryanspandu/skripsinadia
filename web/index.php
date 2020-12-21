<!DOCTYPE html>
<html>
<head>
    <title>Aplikasi Penentuan Insentif Karyawan - Nadia Regina</title>
    <?php include 'head.php'; ?>
    <style>
        .left{
            background: rgb(33,118,207);
            background: linear-gradient(138deg, rgba(33,118,207,1) 0%, rgba(64,163,207,1) 32%, rgba(0,123,255,1) 100%);
            height: 100vh;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-3 left position-fixed" style="z-index:1;">
            <div class="row mt-4">
                <div class="col-12 d-flex flex-row align-items-center">
                    <img src="assets/img/logo.png" width="95px"/>
                    <div class="ml-4">
                        <h1 class="text-white">DINAS PUPR</h1>
                        <p class="text-white">Kabupaten Bogor</p>
                    </div>
                </div>
                <div class="col-12 border-bottom py-3 mt-5">
                    <a href="index.php" class="text-white" style="font-size: 24px;">Data Karyawan</a>
                </div>
                <div class="col-12 border-bottom py-3 mt-3">
                    <a href="tambah.php" class="text-white" style="font-size: 24px;">Tambah Karyawan</a>
                </div>
            </div>
        </div>
        <div class="col-3 left"></div>
        <div class="col-9">
            <div class="row" style="background: rgb(241, 243, 250); height: 56px;">
                <div class="w-100 d-flex flex-row justify-content-end align-items-center px-3">
                    <div class="d-flex flex-row align-items-center">
                        <p class="mb-0 mr-3">User</p>
                        <img src="assets/img/avatar.jpg" width="40px" class="rounded-circle"/>
                    </div>
                </div>
            </div>
            <h3 class="mt-3" style="color:rgb(85, 103, 117);">Data Karyawan</h3>
            <div class="row mt-4">
                <div class="col-12">
                    <table class="table table-dark">
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
                            <th scope="col">Edit</th>
                            <th scope="col">Hapus</th>
                          </tr>
                        </thead>
                    </table>
                </div>
                <div class="col-12" style="max-height: 438px; overflow-y: scroll;">
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
                            <th scope="col">Edit</th>
                            <th scope="col">Hapus</th>
                          </tr>
                        </thead>
                        <tbody class="table-data">
                        <?php
                            include 'conn.php';
                            $data = mysqli_query($conn,"select * from karyawan_kontrak");
                            $i = 1;
                            $j = 1;
                            $k = 1;
                            while($d = mysqli_fetch_array($data)){ 
                        ?>
                          <tr>
                            <th scope="row"><?php echo $i++; ?></th>
                            <td><?php echo 'A'.$k++; ?></td>
                            <td colspan="3" id="nama<?php echo $j++; ?>"><?php echo $d['nama']; ?></td>
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
        </div>
    </div>
</div>
</body>
</html>