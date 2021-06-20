<?php 
error_reporting(0);
include '../../conn.php';
include '../datakaryawan.php';
include '../k-means.php';

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

</head>
<body class="pb-5">        
  <table class="table table-custom table-bordered" style="max-width: 700px; display: none;">
    <thead>
      <tr>
        <th>Kode</th>
        <th class="klaster">Layak</th>
        <th class="klaster">Tidak Layak</th>
        <th class="klaster">Klaster</th>
      </tr>
    </thead>
    <tbody id="tabel-perhitungan-kmeans">
    <?php $j=1; foreach($k_means['hasil'] as $k){ ?>
      <tr>
        <td><?php echo $k['kode']; ?></td>
        <td class="klaster"><?php echo $k['layak']; ?></td>
        <td class="klaster"><?php echo $k['tidak_layak']; ?></td>
        <td class="klaster"><?php echo $k['klaster']; ?></td>
      </tr>
    <?php $j++; } ?>
    </tbody>
  </table>
</div>
<script>
  var dataTableKmeans = $("#tabel-perhitungan-kmeans tr").length;
  var layak = [];
  var tidakLayak = [];
  var klaster = [];
  var zero = 0;
  for(var i=1; i<=dataTableKmeans; i++){
    layak.push(parseFloat($("#tabel-perhitungan-kmeans tr:nth-child("+i+") td:nth-child(2)").text()));
    tidakLayak.push(parseFloat($("#tabel-perhitungan-kmeans tr:nth-child("+i+") td:nth-child(3)").text()));
    klaster.push($("#tabel-perhitungan-kmeans tr:nth-child("+i+") td:nth-child(4)").text());
  }
  console.log(klaster);

  var dataArrayKmeans = [];
  for(var i=0; i<dataTableKmeans; i++){
    var obj = {};
    obj['x'] = tidakLayak[i];
    obj['y'] = layak[i];
    if(klaster[i] === 'layak'){
        obj['markerColor'] = 'orange';
    }else{
        obj['markerColor'] = 'blue';
    }

    dataArrayKmeans.push(obj);
  }
  var dataLayakKmeans = [];
  for(var i=0; i<dataTableKmeans; i++){
    var obj = {};
    obj['x'] = layak[i];
    obj['y'] = layak[i];

    dataLayakKmeans.push(obj);
  }
  var dataTidakLayakKmeans = [];
  for(var i=0; i<dataTableKmeans; i++){
    var obj = {};
    obj['x'] = tidakLayak[i];
    obj['y'] = tidakLayak[i];

    dataTidakLayakKmeans.push(obj);
  }

window.onload = function () {
//Better to construct options first and then pass it as a parameter

var options = {
	animationEnabled: true,
	zoomEnabled: true,
	title:{
		text: "Grafik Klastering K-Means"
	},
	axisX: {
		crosshair: {
			enabled: true,
			snapToDataPoint: true
		}
	},
	axisY:{
		includeZero: false,
		gridThickness: 0,
		crosshair: {
			enabled: true,
			snapToDataPoint: true
		}
	},
	data: [{
        color: "red",
		type: "scatter",
		toolTipContent: "<b>Tidak Layak: </b>{x}<br/><b>Layak: </b>{y}",
		dataPoints: dataArrayKmeans
	}]
};

$("#chartContainer").CanvasJSChart(options);
}
</script>
<div id="chartContainer" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
</body>
</html>