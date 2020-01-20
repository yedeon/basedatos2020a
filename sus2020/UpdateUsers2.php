<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "unity2020";

$id=$_POST["id"];
$descripcion=$_POST["descripcion"];
$precio=$_POST["precio"];
$categoria=$_POST["categoria"];
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    echo "conectado Error";
}
    echo "conectado con exito.<br></br>";
    $sql = " UPDATE bd2 SET id=$id,descripcion =$descripcion,precio=$precio,categoria=$categoria WHERE id=$id";
$result = $conn->query($sql);
echo "<br>"." Update2 : ".$result."</br>";
echo "<br>"." Update2 : ".$sql;
$conn->close();
?>