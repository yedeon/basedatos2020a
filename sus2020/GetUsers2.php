<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "unity2020";

$id=$_POST["id"];
$descripcion=$_POST["descripcion"];

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    //echo "conectado Error";
}
    //echo "conectado con exito.<br></br>";
$sql = "SELECT *  FROM bd2 where id ='".$id."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   
    while($row = $result->fetch_assoc()) {
    echo "<br> id: ". $row["id"]. " - Name: ". $row["descripcion"]. "  Precio: " . $row["precio"]. " Categoria: " . $row["categoria"] . "<br>";
        if($row["descripcion"]==$descripcion){
            echo"Login Ex";
        }
        else{
            echo"Contraseña X ";
        }
    }
} else {
    echo " 0 results ";
}
$conn->close();
?>

