<?php 
include '../conn.php'; 
session_start();

$nip = $_POST['nip'];
$nama = $_POST['nama'];
$jabatan = $_POST['jabatan'];
$password = $_POST['password'];

$query = "INSERT into `admin` VALUES ('{$nip}', '{$nama}', '{$jabatan}', '{$password}')";
$result = mysqli_query($conn,$query);
if($result){
    echo 'Registration success';
    header('Location: ../index.php');
    $_SESSION['nip'] = $id;
}else{
    echo 'Registration failed';
    header('Location: ../login.php');
}

?>