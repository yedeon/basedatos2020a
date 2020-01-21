 <?php
 $servername = "ec2-3-224-165-85.compute-1.amazonaws.com";
        $username = "kvroxolmlcqfgb";
        $password = "47bd6afda672b672b41887acbee02ae16bad469fca70c7581d723875974a83c3";
        $dbname = "d614viiu0ih5q1";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            echo "conectado Error";
        }
            echo "Borrado con exito   ";
        $sql = "DELETE FROM `bd2` WHERE id=7";
        $result = $conn->query($sql);
        echo "<br>"." Borrado : ".$result."</br>";
        echo "<br>"." Borrado : ".$sql;
        $conn->close();
    ?>