<?php
	require 'SQLGlobal.php';

	if($_SERVER['REQUEST_METHOD']=='POST'){
		try{
			$datos = json_decode(file_get_contents("php://input"),true);

            $descripcion = $_POST["descripcion"]; // obtener parametros POST
			//$respuesta = SQLGlobal::cudFiltro("DELETE FROM bd3 WHERE descripcion=?",
			$respuesta = SQLGlobal::cudFiltro("DELETE FROM bd3  WHERE descripcion = ?",
				array($descripcion) 
			);//con filtro ("El tamaño del array debe ser igual a la cantidad de los '?'")
            echo json_encode(array(
				'respuesta'=>'200',
				'estado' => 'Se Borro ok',
				'data'=>$respuesta, //. concatea en php // en +
				'error'=>''
			));
		}catch(PDOException $e){
			echo json_encode(array(
				'respuesta'=>'-1',
				'estado' => 'No EXISTE',
				'data'=>'',
				'error'=>$e->getMessage()
			));
		}
	}
?>
