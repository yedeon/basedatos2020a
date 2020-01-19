<?php
	require 'SQLGlobal.php';

	if($_SERVER['REQUEST_METHOD']=='POST'){
		try{
			$datos = json_decode(file_get_contents("php://input"),true);

           // $id = $datos["id"]; // obtener parametros POST
            $descripcion = $datos["descripcion"];
            $precio = $datos["precio"];
            $categoria = $datos["categoria"];
			//$respuesta = SQLGlobal::query("QUERY");//sin filtro ("No incluir filtros ni '?'")
			$respuesta = SQLGlobal::cudFiltro(
				"INSERT INTO bd2 values(?,?,?)",
				array($descripcion,$precio,$categoria)
			);//con filtro ("El tamaño del array debe ser igual a la cantidad de los '?'")
            if($respuesta>0){
                echo json_encode(array(
                    'respuesta'=>'200',
                    'estado' => 'Se inserto ok',
                    'data'=>'Nro registros afectados son: '.$respuesta,
                    'error'=>''
                ));
            }else{
                echo json_encode(array(
                    'respuesta'=>'100',
                    'estado' => 'No se registro',
                    'data'=>'Nro registros afectados son: '.$respuesta,
                    'error'=>''
                ));
            }
            
		}catch(PDOException $e){
			echo json_encode(
				array(
					'respuesta'=>'-1',
					'estado' => 'Ocurrio un error, intentelo mas tarde',
					'data'=>'',
					'error'=>$e->getMessage())
			);
		}
	}
?>