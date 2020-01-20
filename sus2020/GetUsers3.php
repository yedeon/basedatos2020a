<?php
            //$servername = "WSTIENDA";
            $servername ="ec2-3-224-165-85.compute-1.amazonaws.com"; //host name adress
            $username = "kvroxolmlcqfgb"; //user
            $password = "47bd6afda672b672b41887acbee02ae16bad469fca70c7581d723875974a83c3"; //password
            $dbname = "d614viiu0ih5q1"; //database
            //"apikey:fa666d0c-fcda-48b1-aac4-16bdfd437280"
            //"token autorizacion:"Heroku CLI"  "fa666d0c-fcda-48b1-aac4-16bdfd437280"

            $id=$_POST["id"];
            $descripcion=$_POST["descripcion"];

            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed1: " . $conn->connect_error);
                echo "conectado Error";
            }
                echo "conectado con exito.<br></br>";
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