<?php 
/* fonction php prédéfinie retourne le nombre du chargement dans le serveur */
		$load = sys_getloadavg();
        
$vr="";
$length = count($load);
$compeur="";
for ($i = 0; $i < $length; $i++) {
  $vr=$load[$i];
	$compteur=$i;
} 
/* fonction php permet de convertir size de byte vers kb ou mb */ 
function convert($size)
{
    $unit=array('b','kb','mb','gb','tb','pb');
    return @round($size/pow(1024,($i=floor(log($size,1024)))),2).' '.$unit[$i];
}
/* retourner la valeur du memory usage */ 
function memoryusg($size){
	    return @round($size/pow(1024,($i=floor(log($size,1024)))),2);

}

?>

<html>
<head>
<title>Monitoring Agence des monts: cette page est une option : pas le travail principale</title>	
<meta charset="utf-8"/>	
    <!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="" crossorigin="anonymous">
	
	<!-- FullCalendar -->
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<style>
	.card{
		margin-top: 80px;
		padding-left: 20px;
	}
	.card-header{
		color: white;
		background-color: dimgray;
		width: 100%;
	}
	.card div{
		font-size: 1.8em;
	}
	* {
      font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
    }
    h1 {
      font-size: 3em;
      color: #222222;
      margin: 0;
    }
    h5 {
      margin: 0;
      color: #888888;
    }
    p {
      font-size: 0.7em;
      color: #888888;
    }
    span {
      cursor: pointer;
      font-size: 10px;
      margin-left: 5px;
      border: 1px solid #DDD;
      padding: 3px 10px 4px 10px;
    }
    canvas {
      width: 400px;
      height: 100px;
    }
    .active {
      background: #eeeeee;
    }
    .stats-column {
      flex: 0 0 200px;
    }
    .container:nth-child(2n) {
      display: flex;
      flex-direction: row;
      margin-top: 20px;
      height: 100px;
    }
    .chart-container {
      width: 400px;
      height: 100px;
    }
    .footer {
      position: fixed;
      margin: auto;
      text-align: center;
      left: 0;
      right: 0;
      bottom: 0;
    }
    .span-controls {
      float: right;
    }
	h2{
		margin-top: 50px;
	}
	#myfirstchart{
		margin-top: 60px;
	}
	table{
		margin-top: 150px;
	}
</style>
	<script>
	</script>
	
		 
</head>
	
<body>
	  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
             
                <a class="navbar-brand" href="phpinfo.php">Php Version</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="listofsites.php">service de monitoring HTTP :URL</a>
                    </li> 
                   
                     <li>
                        <a href="#chart_div">CPU usage</a>
                    </li> 
					  <li>
                        <a href="totalram.php">Server details</a>
                    </li> 
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

	<h2>CPU USAGE</h2>
  <div id="chart_div"></div>
<script>
google.charts.load('current', {packages: ['corechart', 'line']});
google.charts.setOnLoadCallback(drawBasic);

function drawBasic() {

      var data = new google.visualization.DataTable();
      data.addColumn('number', 'X');
      data.addColumn('number', 'CPU USAGE');

      data.addRows([
        [0, <?php echo $load[0]*100 ?>],[1,<?php echo $load[1]*100 ; ?>],[2,<?php echo $load[2]*100; ?> ]
      ]);

      var options = {
        hAxis: {
          title: 'Time'
        },
        vAxis: {
          title: 'CPU USAGE'
        }
      };

      var chart = new google.visualization.LineChart(document.getElementById('chart_div'));

      chart.draw(data, options);
    }	
	
	console.log("<?php echo convert(memory_get_usage(true));  ?>");
	
</script>

	
</body>




</html>