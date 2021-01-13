<?php 
include '../conn.php';
$id = $_GET['id'];
$data = mysqli_query($conn,"select * from karyawan_kontrak where id='$id'");
$i=1;
while($d = mysqli_fetch_array($data)){ 
    $id = $d['id'];
    mysqli_query($conn,"UPDATE karyawan_kontrak SET status='penilaian_kasi' where id='$id'");
}
header('Location: ../index.php');
?>