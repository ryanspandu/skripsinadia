<?php 
include '../perhitungan/koneksi.php';

// menangkap data yang di kirim dari form
$kode = $_POST['kode'];
$nama = $_POST['nama'];
$mutu_kerja = $_POST['mutu_kerja'];
$tanggung_jawab = $_POST['tanggung_jawab'];
$inisiatif = $_POST['inisiatif'];
$kejujuran = $_POST['kejujuran'];
$absensi = $_POST['absensi'];
 
// menginput data ke database
mysqli_query($koneksi,"insert into pegawai values('$kode','$nama','$mutu_kerja','$tanggung_jawab','$inisiatif','$kejujuran','$absensi')");
 
// mengalihkan halaman kembali ke index.php
header("location:index.php");
