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
    echo "conectado con exito";
$sql = "SELECT *  FROM bd2 ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
   // echo "<table><tr><th>ID</th><th>Name</th><th>Descripcion</th><th>Precio</th>";
    while($row = $result->fetch_assoc()) {
       echo "<br> id: ". $row["id"]. " - Name: ". $row["descripcion"]. "  Precio: " . $row["precio"]. " Categoria: " . $row["categoria"] . "<br>";
    //echo "<tr><td>". $row["id"]. "<td>". $row["descripcion"]. "<td>" . $row["precio"]. "<td>" . $row["categoria"] ; // td es columna
    }
   // echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>
