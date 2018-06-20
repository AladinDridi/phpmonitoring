<?php
require_once('bdd.php');
$sql3 = "SELECT * FROM urls";
$req3 = $bdd->prepare($sql3);
$req3->execute();
$durls=$req3->fetchall();
$option2 ='';
$option3='';
foreach ($durls as $durl){
  $option2 .=$durl['url'];
  $option3.=$durl['type'];

}


?>