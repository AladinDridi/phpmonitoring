<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=v2_zak;charset=utf8','z_Zak_STan', '3Tm0^al3');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

?>