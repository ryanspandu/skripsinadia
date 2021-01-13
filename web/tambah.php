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

            $opacity[1] = '0.5';
            $opacity[2] = '1';
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
                <form action="proses/tambah.php" method="POST">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Karyawan">
                    </div>
                    <!-- <div class="form-group">
                        <label for="">Mutu Kerja</label>
                        <input type="number" min="0" max="100" class="form-control" name="mk" placeholder="0 - 100" >
                    </div>
                    <div class="form-group">
                        <label for="">Tanggung Jawab</label>
                        <input type="number" min="0" max="100" class="form-control" name="tj" placeholder="0 - 100" >
                    </div>
                    <div class="form-group">
                        <label for="">Inisiatif</label>
                        <input type="number" min="0" max="100" class="form-control" name="in" placeholder="0 - 100" >
                    </div>
                    <div class="form-group">
                        <label for="">Kejujuran</label>
                        <input type="number" min="0" max="100" class="form-control" name="kj" placeholder="0 - 100" >
                    </div>
                    <div class="form-group">
                        <label for="">Absensi</label>
                        <input type="number" min="0" max="100" class="form-control" name="ab" placeholder="0 - 100" >
                    </div> -->
                    <button type="submit" class="simpan-kry-btn btn-lg btn-success float-right">SIMPAN</button>
                </form>
                </div>
                
            </div>
        </div>
    </div>
</div>

<script>
$('.simpan-kry-btn').click(function(){
    alert('Data karyawan berhasil ditambahkan');
});
</script>
</body>
</html>