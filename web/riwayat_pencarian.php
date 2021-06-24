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
        .bg-kabid{
            background: rgb(114, 114, 228);
        }
        .bg-kasi{
            background: rgb(238, 126, 135);
        }
        .bg-kasubag{
            background: rgb(240, 188, 111);
        }
        .kotak{
            width: 15px;
            height: 15px;
        }
    </style>
</head>
<body>
<div class="container mb-5">
    <div class="row">
        <?php 

            $opacity[1] = '0.5';
            $opacity[2] = '0.5';
            $opacity[3] = '0.5';
            $opacity[4] = '1';
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
            <h3 class="mb-3 px-5" style="color:rgb(85, 103, 117);">Riwayat Penilaian</h3>
            <div class="col-12">
                <form class="px-4 d-flex flex-row" action="riwayat_pencarian.php" method="POST">
                    <input type="search" placeholder="cari karyawan" class="form-control" name="keyword"/>
                    <button type="submit" class="btn btn-primary">Cari</button>
                </form>
            </div>
            <div class="col-12 px-5 mb-3">
                <p class="my-0 text-danger">* Keterangan warna penilaian</p>
                <div class="d-flex flex-row align-items-center">
                    <div class="kotak bg-kasi"></div>
                    <p class="my-0 ml-2">Kasi</p>
                </div>
                <div class="d-flex flex-row align-items-center">
                    <div class="kotak bg-kabid"></div>
                    <p class="my-0 ml-2">Kabid</p>
                </div>
                <div class="d-flex flex-row align-items-center">
                    <div class="kotak bg-kasubag"></div>
                    <p class="my-0 ml-2">Kasubag</p>
                </div>
            </div>
                <div class="col-12 px-5">
                    <div style="max-height: 1138px; overflow-y: scroll;">
                        <table class="table table-warning">
                            <thead class=""> 
                              <tr>
                                <th scope="col">No.</th>
                                <th scope="col" colspan="3">Nama</th>
                                <th scope="col" class="bg-kabid">Mutu Kerja</th>
                                <th scope="col" class="bg-kabid">Tanggung Jawab</th>
                                <th scope="col" class="bg-kasi">Inisiatif</th>
                                <th scope="col" class="bg-kasi">Kejujuran</th>
                                <th scope="col" class="bg-kasubag">Absensi</th>
                                <!-- <th scope="col">Aksi</th> -->
                              </tr>
                            </thead>
                            <tbody class="table-data">
                            <?php
                                include 'conn.php';
                                $keyword = $_POST['keyword'];
                                $query = "SELECT * FROM karyawan_kontrak WHERE nama like '%".$keyword."%'";

                                $i = 1;
                                $j = 1;
                                $k = 1;
                                $result = mysqli_query($conn, $query);

                                if(!$result) {
                                    die("Query Error : ".mysqli_errno($conn)." - ".mysqli_error($conn));
                                }
                                //kalau ini melakukan foreach atau perulangan
                                if(mysqli_num_rows($result) != 0){
                                    while ($d = mysqli_fetch_assoc($result)) {
                            ?>
                              <tr>
                                <form action="proses/penilaian.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $d['id']; ?>"/>
                                <input type="hidden" name="status" value="<?php echo $d['status']; ?>"/>
                                <th scope="row"><?php echo $i++; ?></th>
                                <td colspan="3" id="nama<?php echo $j++; ?>"><?php echo $d['nama']; ?></td>
                                <td class="bg-kabid">
                                    <input type="number" min="1" max="100" name="mk" placeholder="0 - 100" value="<?php echo $d['mutu_kerja']; ?>" disabled/>
                                </td>
                                <td class="bg-kabid">
                                    <input type="number" min="1" max="100" name="tj" placeholder="0 - 100" value="<?php echo $d['tanggung_jawab']; ?>" disabled/>
                                </td>
                                <td class="bg-kasi">
                                    <input type="number" min="1" max="100" name="in" placeholder="0 - 100" value="<?php echo $d['inisiatif']; ?>" disabled/>
                                </td>
                                <td class="bg-kasi">
                                    <input type="number" min="1" max="100" name="kj" placeholder="0 - 100" value="<?php echo $d['kejujuran']; ?>" disabled/>
                                </td>
                                <td class="bg-kasubag">
                                    <input type="number" min="1" max="100" name="ab" placeholder="0 - 100" value="<?php echo $d['absensi']; ?>" disabled/>
                                </td>
                                <!-- <td>
                                    <button type="submit" class="proses-btn btn btn-success float-right">SIMPAN</button>
                                </td> -->
                                </form>
                              </tr>
                              <?php 
                              
                                }
                                }else{
                                    ?>
                                    <td colspan="12">Tidak ada karyawan dengan nama <?php echo $_POST['keyword']; ?></td>
                                    <?php
                                }
                              
                              ?>
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