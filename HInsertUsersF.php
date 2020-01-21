<?php
	require 'SQLGlobal.php';

	if($_SERVER['REQUEST_METHOD']=='POST'){
		try{
			$datos = json_decode(file_get_contents("php://input"),true);

            $id = $_POST["id"]; // obtener parametros POST
            $descripcion = $_POST["descripcion"]; 
            $precio = $_POST["precio"]; 
            $categoria = $_POST["categoria"]; 
            //$ids =11;
			$respuesta = SQLGlobal::cudFiltro(
                "INSERT INTO bd2  WHERE id =?,?,?,?",
				array($id,$descripcion,$precio,$categoria) 
            );//con filtro ("El tamaño del array debe ser igual a la cantidad de los '?'")
            echo json_encode(array(
                    'respuesta'=>'200',
                    'estado' => 'Se Inserto ok',
                    'data'=>$respuesta, //. concatea en php // en +
                    'error'=>''
                ));
            }catch(PDOException $e){
                echo json_encode(array(
                    'respuesta'=>'-1',
                    'estado' => 'No se Inserto',
                    'data'=>'',
                    'error'=>$e->getMessage()
                ));
		    }
	    }
?>
