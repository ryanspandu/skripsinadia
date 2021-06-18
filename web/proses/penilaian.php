<?php 
include '../conn.php'; 
// session_start();

$id = $_POST['id'];
$status = $_POST['status'];

// var_dump($_POST);

if($status !== 'acc_kadis'){
    if($status == 'penilaian_kasi'){
        $status = 'penilaian_kabid';
        $in = intval($_POST['in']);
        $kj = intval($_POST['kj']);
        mysqli_query($conn,"UPDATE karyawan_kontrak SET status='$status', inisiatif='$in', kejujuran='$kj' where id='$id'");
        header('Location: ../penilaian.php');
    }elseif($status == 'penilaian_kabid'){
        $status = 'penilaian_kasubag';
        $mk = intval($_POST['mk']);
        $tj = intval($_POST['tj']);
        mysqli_query($conn,"UPDATE karyawan_kontrak SET status='$status', mutu_kerja='$mk', tanggung_jawab='$tj' where id='$id'");
        header('Location: ../penilaian.php');
    }elseif($status == 'penilaian_kasubag'){
        $status = 'acc_kadis';
        $ab = intval($_POST['ab']);
        mysqli_query($conn,"UPDATE karyawan_kontrak SET status='$status', absensi='$ab' where id='$id'");
        header('Location: ../penilaian.php');
    }
}else{
    $status = 'acc';
    mysqli_query($conn,"UPDATE karyawan_kontrak SET status='$status' where id='$id'");
    header('Location: ../penilaian.php');
}

// echo mysqli_error($conn);
// header('Location: ../penilaian.php');


?>