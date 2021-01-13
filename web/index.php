<?php 
session_start();

if(! isset($_SESSION['nip'])){
    header('Location: login.php');
}
?>
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
<div class="container mb-5">
    <div class="row">
        <?php 
        
            $opacity[1] = '1';
            $opacity[2] = '0.5';
            $opacity[3] = '0.5';
            include 'sidebar.php'; 
            
        ?>
        <div class="col-9">
            <div class="row" style="background: rgb(241, 243, 250); height: 56px;">
                <div class="w-100 d-flex flex-row justify-content-end align-items-center px-3">
                    <div class="d-flex flex-row align-items-center">
                        <p class="mb-0 mr-3"><?php if(isset($_SESSION['nama'])) { echo $_SESSION['nama']; } if(isset($_SESSION['jabatan'])) { echo ' ('. $_SESSION['jabatan'] .') '; } ?></p>
                        <img src="assets/img/avatar.jpg" width="40px" class="rounded-circle"/>
                    </div>
                <a href="logout.php" class="mb-0 ml-3"><img src="assets/img/exit.svg"/> Logout</a>
                </div>
            </div>
            <div class="row mt-4">
                <h3 class="mb-3 px-5" style="color:rgb(85, 103, 117);">Data Karyawan</h3>
                <div class="col-12 px-5">
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
                            <?php if($_SESSION['jabatan'] == 'Kadis' || $_SESSION['jabatan'] == 'Admin') { ?>
                            <th scope="col">Aksi</th>
                            <?php } ?>
                          </tr>
                        </thead>
                    </table>
                </div>
                <div class="col-12 px-5">
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
                                <?php if($_SESSION['jabatan'] == 'Kadis' || $_SESSION['jabatan'] == 'Admin') { ?>
                                <th scope="col">Aksi</th>
                                <?php } ?>
                              </tr>
                            </thead>
                            <tbody class="table-data">
                            <?php
                                include 'conn.php';
                                $data = mysqli_query($conn,"SELECT * FROM karyawan_kontrak WHERE status='acc'");
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
                                <?php if($_SESSION['jabatan'] == 'Kadis' || $_SESSION['jabatan'] == 'Admin') { ?>
                                <td>
                                    <a href="proses/tinjau.php?id=<?php echo $d['id']; ?>" class="tinjau">
                                        <i class="material-icons">Tinjau</i>
                                    </a>
                                </td>
                                <?php } ?>
                                <!-- <td>
                                    <a href="../perhitungan/hapus.php?id=<?php echo $d['id']; ?>">
                                        <i class="material-icons text-danger">delete</i>
                                    </a>
                                </td> -->
                              </tr>
                              <?php } ?>
                            </tbody>
                          </table>
                    </div>
                </div>
                <div class="col-12 mt-3 px-5">
                    <button class="proses-btn btn-lg btn-success float-right">PROSES</button>
                </div>
                <div class="col-12 mt-5 px-5">
                    <div class="main">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
var click=0;
// production
// $('.proses-btn').click(function(){
//     if(click == 0){
//         $.get("perhitungan/index.php", function(data){
//         $(".main").html(data);
//         });
//         click = 1;
//     }else{
//         alert('Perintah sudah dijalankan');
//     }
// });

// development
$('.proses-btn').click(function(){
    alert('Sedang menjalankan metode, mohon tunggu sampai hasil keluar');
    $.get("perhitungan/index.php", function(data){
    $(".main").html(data);
    });
});
$('.tinjau').click(function(){
    alert('Data akan ditinjau kembali dan melakukan penilaian dari awal lagi');
});
</script>
</body>
</html>