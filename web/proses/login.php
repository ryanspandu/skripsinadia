<?php 
include '../conn.php'; 
session_start();

$nip = $_POST['nip'];
$password = $_POST['password'];

$query = "SELECT * FROM `admin` WHERE id='{$nip}'
and password='{$password}'";
$result = mysqli_query($conn,$query) or die(mysqli_error($conn));
$rows = mysqli_num_rows($result);


if($rows==1){
$_SESSION['username'] = $username;
    header("Location: ../index.php");
    $_SESSION['nip'] = $nip;
    while($row = mysqli_fetch_assoc($result)) {
        $_SESSION['nama'] = $row["nama"];
     }
}else{
    header("Location: ../login.php");
    $_SESSION['login_msg'] = 'Gagal Login';
    // echo mysqli_error($conn);
}
?>