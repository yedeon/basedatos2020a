<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "unity2020";

$id=$_POST["id"];
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    echo "conectado Error";
}
    echo "conectado con exito.<br></br>";
$sql = "DELETE FROM `bd2` WHERE id=".$id;
$result = $conn->query($sql);
echo "<br>"." Borrado2 : ".$result."</br>";
echo "<br>"." Borrado2 : ".$sql;
$conn->close();
?>