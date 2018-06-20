<?php
require_once('bdd.php');
//echo $_POST['title'];
if ($_POST){
	
	$url=$_POST['url'];
	$type=$_POST['type'];
	
	$sql = "INSERT INTO urls(url, type) values ('$url', '$type')";
	//$req = $bdd->prepare($sql);
	//$req->execute();
	
	echo $sql;
	
	$query = $bdd->prepare( $sql );
	if ($query == false) {
	 print_r($bdd->errorInfo());
	 die ('Erreur prepare');
	}
	$sth = $query->execute();
	if ($sth == false) {
	 print_r($query->errorInfo());
	 die ('Erreur execute');
	}
}
header('Location: '.$_SERVER['HTTP_REFERER']);




?>