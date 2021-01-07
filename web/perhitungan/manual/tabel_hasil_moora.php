<?php 
error_reporting(0);
include '../../conn.php';
include '../datakaryawan.php';
include '../k-means.php';
include '../moora.php';

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
<p>Lampiran 8. Tabel Hasil Perangkingan Moora</p> 
<p style="">Optimasi & Perangkingan MOORA</p>            
    <table class="table table-custom table-bordered" style="max-width: 700px;">
      <thead>
        <tr>
          <th>No.</th>
          <th class="nilai">Kode</th>
          <th class="nilai">Nama</th>
          <th class="nilai">Optimasi</th>
          <th class="nilai">Klaster</th>
        </tr>
      </thead>
      <tbody>
      <?php $i=1; foreach($hasil_moora['layak'] as $k){ ?>
        <tr>
          <td><?php echo $i++; ?></td>
          <td><?php echo $k['kode']; ?></td>
          <td class="nilai"><?php echo $k['nama']; ?></td>
          <td class="nilai"><?php echo $k['optimasi']; ?></td>
          <td class="nilai">Layak</td>
        </tr>
      <?php  } ?>
      <?php foreach($hasil_moora['tidak_layak'] as $k){ ?>
        <tr>
          <td><?php echo $i; ?></td>
          <td><?php echo $k['kode']; ?></td>
          <td class="nilai"><?php echo $k['nama']; ?></td>
          <td class="nilai"><?php echo $k['optimasi']; ?></td>
          <td class="nilai">Tidak Layak</td>
        </tr>
      <?php  $i++; } ?>
      </tbody>
    </table>
</div>
</body>
</html>