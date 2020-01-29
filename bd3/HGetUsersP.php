<?php
	require 'SQLGlobal.php';

	if($_SERVER['REQUEST_METHOD']=='POST'){
		try{
			$datos = json_decode(file_get_contents("php://input"),true);

            $descripcion = $_POST["descripcion"]; // obtener parametros POST
			$respuesta = SQLGlobal::selectArrayFiltro(
                "SELECT * FROM bd3  WHERE LOWER(descripcion) =Lower(?)",
				array($descripcion.'%') 
			);//con filtro ("El tamaño del array debe ser igual a la cantidad de los '?'")
            if($respuesta>0){
                echo json_encode(array(
                    'respuesta'=>'200',
                    'estado' => 'Se Encontro ok',
                    'data'=>'Nro registros afectados son: '.$respuesta, //. concatea en php // en +
                    'error'=>'1'
                ));
            }else{
                echo json_encode(array(
                    'respuesta'=>'100',
                    'estado' => 'No EXISTE',
                    'data'=>'Nro registros afectados son: '.$respuesta,
                    'error'=>'2'
                ));
            }
            }catch(PDOException $e){
                echo json_encode(array(
                    'respuesta'=>'-1',
                    'estado' => 'Rrrrosote ',
                    'data'=>'',
                    //'error'=>$e->getMessage()
                    'error'=>'3'
                    )
		
			);
		}
	}
?>

