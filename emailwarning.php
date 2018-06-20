<?php
// prendre le nom du domaine courrant // 
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
$host="localhost";
$user="z_Zak_STan";
$pass="3Tm0^al3";
$db="v2_zak";
$conn=mysqli_connect($host,$user,$pass,$db); 
//executer une requite //
$SQL = mysqli_query($conn,"SELECT * from urls");
    while($row=mysqli_fetch_array($SQL)){
        
       /* if différent du 400 > ou 500> #false */
		if( !url_test( $row['url'] ) ) {
			/* email de recevoir */
$to = " contact@zakstan.com";
			/*titre du message */
$subject = "url monitoring";
/* message */
$message = $row['url']." "."est baisse";

//urf 8 encodage des caractéres spéciaux 
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: <webmaster@example.com>' . "\r\n";
$headers .= 'Cc: myboss@example.com' . "\r\n";

mail($to,$subject,$message,$headers);
}
else 

{ /*echo 
$to = "admin@rumi-app.org";
$subject = "HTML email";

$message = "pas d'erreur";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <webmaster@example.com>' . "\r\n";
$headers .= 'Cc: myboss@example.com' . "\r\n";

mail($to,$subject,$message,$headers);
	 
	
 */
	 }
	 }





?> 