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
mysqli_query($koneksi,"UPDATE pegawai SET kode='$kode',nama='$nama',mutu_kerja='$mutu_kerja',tanggung_jawab='$tanggung_jawab',inisiatif='$inisiatif',kejujuran='$kejujuran',absensi='$absensi' WHERE kode='$kode'");
 
// mengalihkan halaman kembali ke index.php
header("location:index.php");