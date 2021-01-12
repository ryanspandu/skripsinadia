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
            $opacity[2] = '0.5';
            $opacity[3] = '1';
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
            <h3 class="mb-3 px-5" style="color:rgb(85, 103, 117);">Penilaian Kasi</h3>
                <div class="col-12 px-5">
                    <div style="max-height: 438px; overflow-y: scroll;">
                        <table class="table table-warning">
                            <thead class=""> 
                              <tr>
                                <th scope="col">No.</th>
                                <th scope="col" colspan="3">Nama</th>
                                <th scope="col">Mutu Kerja</th>
                                <th scope="col">Tanggung Jawab</th>
                                <th scope="col">Inisiatif</th>
                                <th scope="col">Kejujuran</th>
                                <th scope="col">Absensi</th>
                                <th scope="col">Aksi</th>
                              </tr>
                            </thead>
                            <tbody class="table-data">
                            <?php
                                include 'conn.php';

                                if(isset($_SESSION['jabatan'])){
                                    $jabatan = $_SESSION['jabatan'];
                                }
                                if($jabatan == 'Kasi' || $jabatan == 'Admin'){
                                    $disabled = '';
                                    echo '<p class="text-success">(Anda Memiliki Akses)</p>';
                                }else{
                                    $disabled = 'disabled';
                                    echo '<p class="text-danger">(Anda Tidak Memiliki Akses)</p>';
                                }

                                $data = mysqli_query($conn,"SELECT * FROM karyawan_kontrak WHERE status='penilaian_kasi'");
                                $i = 1;
                                $j = 1;
                                $k = 1;
                                while($d = mysqli_fetch_array($data)){ 
                            ?>
                              <tr>
                                <form action="proses/penilaian.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $d['id']; ?>"/>
                                <input type="hidden" name="status" value="<?php echo $d['status']; ?>"/>
                                <th scope="row"><?php echo $i++; ?></th>
                                <td colspan="3" id="nama<?php echo $j++; ?>"><?php echo $d['nama']; ?></td>
                                <td>
                                    <input type="number" min="1" max="100" name="mk" placeholder="0 - 100" <?php echo $disabled; ?>/>
                                </td>
                                <td>
                                    <input type="number" min="1" max="100" name="tj" placeholder="0 - 100" <?php echo $disabled; ?>/>
                                </td>
                                <td>
                                    <input type="number" min="1" max="100" name="in" placeholder="0 - 100" <?php echo $disabled; ?>/>
                                </td>
                                <td>
                                    <input type="number" min="1" max="100" name="kj" placeholder="0 - 100" <?php echo $disabled; ?>/>
                                </td>
                                <td>
                                    <input type="number" min="1" max="100" name="ab" placeholder="0 - 100" <?php echo $disabled; ?>/>
                                </td>
                                <td>
                                    <button type="submit" class="proses-btn btn btn-success float-right" <?php echo $disabled; ?>>SIMPAN</button>
                                </td>
                                </form>
                              </tr>
                              <?php } ?>
                            </tbody>
                          </table>
                    </div>
                </div>               
            </div>

            <div class="row mt-4">
            <h3 class="mb-3 px-5" style="color:rgb(85, 103, 117);">Penilaian Kabid</h3>
                <div class="col-12 px-5">
                    <div style="max-height: 438px; overflow-y: scroll;">
                        <table class="table table-warning">
                            <thead class=""> 
                              <tr>
                                <th scope="col">No.</th>
                                <th scope="col" colspan="3">Nama</th>
                                <th scope="col">Mutu Kerja</th>
                                <th scope="col">Tanggung Jawab</th>
                                <th scope="col">Inisiatif</th>
                                <th scope="col">Kejujuran</th>
                                <th scope="col">Absensi</th>
                                <th scope="col">Aksi</th>
                              </tr>
                            </thead>
                            <tbody class="table-data">
                            <?php
                                include 'conn.php';

                                if(isset($_SESSION['jabatan'])){
                                    $jabatan = $_SESSION['jabatan'];
                                }
                                if($jabatan == 'Kabid' || $jabatan == 'Admin'){
                                    $disabled = '';
                                    echo '<p class="text-success">(Anda Memiliki Akses)</p>';
                                }else{
                                    $disabled = 'disabled';
                                    echo '<p class="text-danger">(Anda Tidak Memiliki Akses)</p>';
                                }

                                $data = mysqli_query($conn,"SELECT * FROM karyawan_kontrak WHERE status='penilaian_kabid'");
                                $i = 1;
                                $j = 1;
                                $k = 1;
                                while($d = mysqli_fetch_array($data)){ 
                            ?>
                              <tr>
                                <form action="proses/penilaian.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $d['id']; ?>"/>
                                <input type="hidden" name="status" value="<?php echo $d['status']; ?>"/>
                                <th scope="row"><?php echo $i++; ?></th>
                                <td colspan="3" id="nama<?php echo $j++; ?>"><?php echo $d['nama']; ?></td>
                                <td>
                                    <input type="number" min="1" max="100" name="mk" value="<?php echo $d['mutu_kerja']; ?>" <?php echo $disabled; ?>/>
                                </td>
                                <td>
                                    <input type="number" min="1" max="100" name="tj" value="<?php echo $d['tanggung_jawab']; ?>" <?php echo $disabled; ?>/>
                                </td>
                                <td>
                                    <input type="number" min="1" max="100" name="in" value="<?php echo $d['inisiatif']; ?>" <?php echo $disabled; ?>/>
                                </td>
                                <td>
                                    <input type="number" min="1" max="100" name="kj" value="<?php echo $d['kejujuran']; ?>" <?php echo $disabled; ?>/>
                                </td>
                                <td>
                                    <input type="number" min="1" max="100" name="ab" value="<?php echo $d['absensi']; ?>" <?php echo $disabled; ?>/>
                                </td>
                                <td>
                                    <button type="submit" class="proses-btn btn btn-success float-right" <?php echo $disabled; ?>>SIMPAN</button>
                                </td>
                                </form>
                              </tr>
                              <?php } ?>
                            </tbody>
                          </table>
                    </div>
                </div>
            </div>


            <div class="row mt-4">
            <h3 class="mb-3 px-5" style="color:rgb(85, 103, 117);">Penilaian Kasubag</h3>
                <div class="col-12 px-5">
                    <div style="max-height: 438px; overflow-y: scroll;">
                        <table class="table table-warning">
                            <thead class=""> 
                              <tr>
                                <th scope="col">No.</th>
                                <th scope="col" colspan="3">Nama</th>
                                <th scope="col">Mutu Kerja</th>
                                <th scope="col">Tanggung Jawab</th>
                                <th scope="col">Inisiatif</th>
                                <th scope="col">Kejujuran</th>
                                <th scope="col">Absensi</th>
                                <th scope="col">Aksi</th>
                              </tr>
                            </thead>
                            <tbody class="table-data">
                            <?php
                                include 'conn.php';

                                if(isset($_SESSION['jabatan'])){
                                    $jabatan = $_SESSION['jabatan'];
                                }
                                if($jabatan == 'Kasubag' || $jabatan == 'Admin'){
                                    $disabled = '';
                                    echo '<p class="text-success">(Anda Memiliki Akses)</p>';
                                }else{
                                    $disabled = 'disabled';
                                    echo '<p class="text-danger">(Anda Tidak Memiliki Akses)</p>';
                                }

                                $data = mysqli_query($conn,"SELECT * FROM karyawan_kontrak WHERE status='penilaian_kasubag'");
                                $i = 1;
                                $j = 1;
                                $k = 1;
                                while($d = mysqli_fetch_array($data)){ 
                            ?>
                              <tr>
                                <form action="proses/penilaian.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $d['id']; ?>"/>
                                <input type="hidden" name="status" value="<?php echo $d['status']; ?>"/>
                                <th scope="row"><?php echo $i++; ?></th>
                                <td colspan="3" id="nama<?php echo $j++; ?>"><?php echo $d['nama']; ?></td>
                                <td>
                                    <input type="number" min="1" max="100" name="mk" value="<?php echo $d['mutu_kerja']; ?>" <?php echo $disabled; ?>/>
                                </td>
                                <td>
                                    <input type="number" min="1" max="100" name="tj" value="<?php echo $d['tanggung_jawab']; ?>" <?php echo $disabled; ?>/>
                                </td>
                                <td>
                                    <input type="number" min="1" max="100" name="in" value="<?php echo $d['inisiatif']; ?>" <?php echo $disabled; ?>/>
                                </td>
                                <td>
                                    <input type="number" min="1" max="100" name="kj" value="<?php echo $d['kejujuran']; ?>" <?php echo $disabled; ?>/>
                                </td>
                                <td>
                                    <input type="number" min="1" max="100" name="ab" value="<?php echo $d['absensi']; ?>" <?php echo $disabled; ?>/>
                                </td>
                                <td>
                                    <button type="submit" class="proses-btn btn btn-success float-right" <?php echo $disabled; ?>>SIMPAN</button>
                                </td>
                                </form>
                              </tr>
                              <?php } ?>
                            </tbody>
                          </table>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
            <h3 class="mb-3 px-5" style="color:rgb(85, 103, 117);">Acc Kadis</h3>
                <div class="col-12 px-5">
                    <div style="max-height: 438px; overflow-y: scroll;">
                        <table class="table table-primary">
                            <thead class=""> 
                              <tr>
                                <th scope="col">No.</th>
                                <th scope="col" colspan="3">Nama</th>
                                <th scope="col">Mutu Kerja</th>
                                <th scope="col">Tanggung Jawab</th>
                                <th scope="col">Inisiatif</th>
                                <th scope="col">Kejujuran</th>
                                <th scope="col">Absensi</th>
                                <th scope="col">Aksi</th>
                              </tr>
                            </thead>
                            <tbody class="table-data">
                            <?php
                                include 'conn.php';

                                if(isset($_SESSION['jabatan'])){
                                    $jabatan = $_SESSION['jabatan'];
                                }
                                if($jabatan == 'Kadis' || $jabatan == 'Admin'){
                                    $disabled = '';
                                    echo '<p class="text-success">(Anda Memiliki Akses)</p>';
                                }else{
                                    $disabled = 'disabled';
                                    echo '<p class="text-danger">(Anda Tidak Memiliki Akses)</p>';
                                }

                                $data = mysqli_query($conn,"SELECT * FROM karyawan_kontrak WHERE status='acc_kadis'");
                                $i = 1;
                                $j = 1;
                                $k = 1;
                                while($d = mysqli_fetch_array($data)){ 
                            ?>
                              <tr>
                                <form action="proses/penilaian.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $d['id']; ?>"/>
                                <input type="hidden" name="status" value="<?php echo $d['status']; ?>"/>
                                <th scope="row"><?php echo $i++; ?></th>
                                <td colspan="3" id="nama<?php echo $j++; ?>"><?php echo $d['nama']; ?></td>
                                <td>
                                    <?php echo $d['mutu_kerja']; ?>
                                </td>
                                <td>
                                    <?php echo $d['tanggung_jawab']; ?>
                                </td>
                                <td>
                                    <?php echo $d['inisiatif']; ?>
                                </td>
                                <td>
                                    <?php echo $d['kejujuran']; ?>
                                </td>
                                <td>
                                    <?php echo $d['absensi']; ?>
                                </td>
                                <td>
                                    <button type="submit" class="proses-btn btn btn-primary float-right" <?php echo $disabled; ?>>ACC</button>
                                </td>
                                </form>
                              </tr>
                              <?php } ?>
                            </tbody>
                          </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script>

</script>
</body>
</html>