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
    echo "UpdateUsers con exito   ";
$sql = " UPDATE bd2 SET id=8,descripcion =3,precio=3,categoria=3 WHERE id=19; ";
$result = $conn->query($sql);
echo "<br>"." Update Users : ".$result."</br>";
echo "<br>"." Update Users : ".$sql;
$conn->close();
?>
