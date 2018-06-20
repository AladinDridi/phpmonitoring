<?php 
/* tableau mais pour tester , les urls enrigestrés dans une table bd */
$liste=array("www.chiens-de-france.fr","www.citycanine.fr","www.dogslovers.fr","www.pa-formation-www.canine.fr","www.francetuningcar.fr","www.motorline.fr","www.passion-renault.fr","www.peugeot206.fr","www.pieceonline-www.auto.fr","www.racecar.fr","www.espacesantebeaute.com","www.institwww.ut-beaute-bio-aquamarine.com","www.institut-beaute-coiffure-geneve.com","www.institut-beaute-lemondedesophie.com");

function url_test( $url ) {
  $timeout = 10;
	/* Création d'un gestionnaire curl */
  $ch = curl_init();
	/*Définit une option de transmission cURL*/
	/*prendre et recuperer l'url */
  curl_setopt ( $ch, CURLOPT_URL, $url );
	/* retourne l'url sous forme chaine des caratéres */ 
  curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
	/*Le temps maximum d'exécution de la fonction cURL exprimé en secondes.*/
  curl_setopt ( $ch, CURLOPT_TIMEOUT, $timeout );
/*	Exécute la session cURL fournie.*/


  $http_respond = curl_exec($ch);
	/* retourner la chaîne  après avoir supprimé tous les octets nuls, toutes les balises PHP et HTML du code. Elle génère des alertes si les balises sont incomplètes ou erronées */
  $http_respond = trim( strip_tags( $http_respond ) );
	/* dernier code HTTP reçu */
	/* les codes https ici https://fr.wikipedia.org/wiki/Liste_des_codes_HTTP */
  $http_code = curl_getinfo( $ch, CURLINFO_HTTP_CODE );
	/* ç'est à dire  un lien de redirection ou une  Requête http traitée avec succès*/
  if ( ( $http_code == "200" ) || ( $http_code == "302" ) ) {
    return true;
  } else {
    // possibilité d'avoir une erreur si le code commence par 4 ou 5  //
    return false;
  }
  curl_close( $ch );
}


require_once('selecturls.php');
$list_urls=$option2;

?>

<html>
<head>
<title>Monitoring Agence des monts</title>	
<meta charset="utf-8"/>	
    <!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="" crossorigin="anonymous">
	
	<!-- FullCalendar -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
	section{
		display: block;
	}
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
	table{
		margin-top: 150px;
	}
	.monformpopup{
		width: 400px;
		height: 400px;
		border: 3px solid black;
	}
	.shadowpopup{
	   width: 100%;
		height: 100%;
		background-color: rgba(0,0,0,0.4);
	}
	form{
		width: 300px !important ;
	}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $(".shadowpopup").fadeOut();
	$(".monformpopup").fadeOut();
	$(".btn").click(function(){
	
	});
	
});
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
                        <a href="index.php">CPU usage</a>
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
	<section>
 
       <div class="container">
  <h2>Tableau</h2>
  <table class="table table-striped">
    <thead>
    <th>url</th>
    <th>Repond avec server</th>
    
    </thead>
    <tbody>
<?php 
        // connection a la db //
$host="localhost";
$user="z_Zak_STan";
$pass="3Tm0^al3";
$db="v2_zak";
$conn=mysqli_connect($host,$user,$pass,$db); 
//executer une requite //
$SQL = mysqli_query($conn,"SELECT * from urls");
    while($row=mysqli_fetch_array($SQL)){
        ?>
        <tr>
        <td><?php echo $row['url'] ; ?></td>
        <td><?php 
		if( !url_test( $row['url'] ) ) {
  echo $row['url']." est baisse!";
}
else { echo $row['url'] ." fonctionne correctement."; }}
			
			?>
			</td>
       

        </tbody>
        </table>
    </div>


     
    </tbody>
  </table>
<div class="container">
  <h2></h2>
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">ajouter url</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <p>ajouter votre url et le type de l'url.</p>
        </div>
		  <div class="container">
  <h2>url form</h2>
  <form method="post" action="addurl.php">
    <div class="form-group">
      <label for="url" >url:</label>
      <input type="text" name="url" class="form-control" id="email" placeholder="Enter url">
    </div>
    <div class="form-group">
      <label for="type" >type:</label>
      <input type="text" name="type" class="form-control" id="pwd" placeholder="Enter type">
    </div>
    
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">fermer</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>

</div>


</section>


</body>




</html>