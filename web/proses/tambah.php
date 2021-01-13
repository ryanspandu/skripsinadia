<?php 
include '../conn.php'; 
// session_start();

$nama = $_POST['nama'];
$status = 'penilaian_kasi';
// $mk = intval($_POST['mk']);
// $tj = intval($_POST['tj']);
// $in = intval($_POST['in']);
// $kj = intval($_POST['kj']);
// $ab = intval($_POST['ab']);

var_dump($_POST);

$query = "INSERT into `karyawan_kontrak` (id, nama, status) VALUES ('', '{$nama}', '{$status}')";
mysqli_query($conn,$query);
// echo mysqli_error($conn);
header('Location: penilaian.php');
// if($result){
//     echo 'Registration success';
//     header('Location: ../index.php');
// }

?>