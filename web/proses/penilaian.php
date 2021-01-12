<?php 
include '../conn.php'; 
// session_start();

$id = $_POST['id'];
$status = $_POST['status'];

var_dump($_POST);

if($status !== 'acc_kadis'){
    if($status == 'penilaian_kasi'){
        $status = 'penilaian_kabid';
    }elseif($status == 'penilaian_kabid'){
        $status = 'penilaian_kasubag';
    }elseif($status == 'penilaian_kasubag'){
        $status = 'acc_kadis';
    }
    $mk = intval($_POST['mk']);
    $tj = intval($_POST['tj']);
    $in = intval($_POST['in']);
    $kj = intval($_POST['kj']);
    $ab = intval($_POST['ab']);
    mysqli_query($conn,"UPDATE karyawan_kontrak SET status='$status', mutu_kerja='$mk', tanggung_jawab='$tj', inisiatif='$in', kejujuran='$kj', absensi='$ab' where id='$id'");
}else{
    $status = 'acc';
    mysqli_query($conn,"UPDATE karyawan_kontrak SET status='$status' where id='$id'");
}

// echo mysqli_error($conn);
header('Location: ../penilaian.php');


?>