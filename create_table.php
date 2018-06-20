<?php 
$servername = "localhost";
$username = "z_Zak_STan";
$password = "3Tm0^al3";
$dbname = "v2_zak";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// sql to create table
$sql = "CREATE TABLE urls (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
url VARCHAR(30) NOT NULL,
type VARCHAR(30) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table urls created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>