<?php 
include '../conn.php'; 
// session_start();

$id = $_POST['id'];
$status = $_POST['status'];
if($status == 'penilaian_kasi'){
    $status = 'penilaian_kabid';
}elseif($status == 'penilaian_kabid'){
    $status = 'acc';
}
$mk = intval($_POST['mk']);
$tj = intval($_POST['tj']);
$in = intval($_POST['in']);
$kj = intval($_POST['kj']);
$ab = intval($_POST['ab']);

// var_dump($_POST);

mysqli_query($conn,"UPDATE karyawan_kontrak SET status='$status', mutu_kerja='$mk', tanggung_jawab='$tj', inisiatif='$in', kejujuran='$kj', absensi='$ab' where id='$id'");
// echo mysqli_error($conn);
header('Location: ../penilaian.php');
// if($result){
//     echo 'Registration success';
//     header('Location: ../index.php');
// }

?>