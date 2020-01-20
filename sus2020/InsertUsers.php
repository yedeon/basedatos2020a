<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "unity2020";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    echo "conectado Error";
}
    echo "conectado con exito   ";
//$sql = "SELECT *  FROM bd2 ";
$sql = "INSERT INTO `bd2`(`id`, `descripcion`, `precio`, `categoria`) VALUES ('','8',8,'letras')";
$result = $conn->query($sql);
echo "<br>"." Insertado : ".$result."</br>";
echo "<br>"." Insertado : ".$sql;
$conn->close();
?>
