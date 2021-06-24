<?php 
include '../conn.php'; 
    $keyword = $_POST['keyword'];
    // var_dump($keyword);
    $query = "SELECT * FROM karyawan_kontrak WHERE nama like '%".$keyword."%'";


    $result = mysqli_query($conn, $query);

    if(!$result) {
        die("Query Error : ".mysqli_errno($conn)." - ".mysqli_error($conn));
    }
    //kalau ini melakukan foreach atau perulangan
    while ($row = mysqli_fetch_assoc($result)) {
    ?>
    <tr>
    <td><?php echo $row['nama']; ?></td>
    <td><?php echo $row['mutu_kerja']; ?></td>
    <td><?php echo $row['tanggung_jawab']; ?></td>
    </tr>
<?php
}
?>