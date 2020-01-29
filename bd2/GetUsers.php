<!DOCTYPE html>
<html>
<body>

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
$sql = "SELECT id,descripcion,precio,categloria FROM bd2 ";
//$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
       echo "<br> id: ". $row["id"]. " - Name: ". $row["descripcion"]. " " . $row["precio"]. " " . $row["categloria"] . "<br>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>

</body>
</html>