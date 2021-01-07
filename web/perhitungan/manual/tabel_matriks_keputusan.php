<?php 
error_reporting(0);
include '../../conn.php';
include '../datakaryawan.php';
include '../dd.php';

// dd($karyawan);
?>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <style>
    .table-custom{
    border: 1px solid black;
    font-size: 10px !important;
    padding: 14px !important;
    margin:0;
    }
    .table-custom tr, .table-custom th, .table-custom td{
    border: 1px solid black !important;
    }
    .nilai{
        max-width: 70px !important;
    }
    .klaster{
        width: 100px !important;
    }
    .nama{
        width: 220px !important;
    }
</style>
</head>
<body class="pb-5">
<div class="" style="margin-bottom: 30px; margin-left: 10px; margin-top: 30px;">
    <p>Lampiran 4. Data Matriks Keputusan </p>            
    <table class="table table-custom table-bordered" style="max-width: 700px;">
        <thead>
        <tr>
            <th class="nilai">Kode</th>
            <th class="nilai">Mutu Kerja</th>
            <th class="nilai">Tanggung Jawab</th>
            <th class="nilai">Inisiatif</th>
            <th class="nilai">Kejujuran</th>
            <th class="nilai">Absensi</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($karyawan as $k) { ?>
        <tr>

            <td class="nilai"><?php echo $k['kode']; ?></td>
            <td class="nilai"><?php echo $k['mutu_kerja']; ?></td>
            <td class="nilai"><?php echo $k['tanggung_jawab']; ?></td>
            <td class="nilai"><?php echo $k['inisiatif']; ?></td>
            <td class="nilai"><?php echo $k['kejujuran']; ?></td>
            <td class="nilai"><?php echo $k['absensi']; ?></td>
        </tr>
        <?php }  ?>
        </tbody>
    </table>
</div>
</body>
</html>