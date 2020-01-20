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
    echo "Borrado con exito   ";
$sql = "DELETE FROM `bd2` WHERE id=23";
$result = $conn->query($sql);
echo "<br>"." Borrado : ".$result."</br>";
echo "<br>"." Borrado : ".$sql;
$conn->close();
?>
