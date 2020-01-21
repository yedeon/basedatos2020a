<?php
	require 'SQLGlobal.php';

	if($_SERVER['REQUEST_METHOD']=='POST'){
		try{
			$_Post= json_decode(file_get_contents("php://input"),true);

            (int)$id=$_Post["id"]; // obtener parametros GET
            $descripcion=$_Post["descripcion"];
            (int)$precio=$_Post["precio"];
            $categoria=$_Post["categoria"];
			$respuesta = SQLGlobal::cudFiltro(
				"UPDATE bd2 SET descripcion=?,precio=?,categoria=? WHERE id=?",
				array($descripcion,(int)$precio,$categoria,(int)$id)
            );//con filtro ("El tamaño del array debe ser igual a la cantidad de los '?'")
            if($respuesta>0){
                echo json_encode(array(
                    'respuesta'=>'200',
                    'estado' => 'Se actualizo correctamente el producto',
                    'data'=>'Numero de filas afectadas: '.$respuesta,
                    'error'=>''
                ));
            }else{
                echo json_encode(array(
                    'respuesta'=>'100',
                    'estado' => 'No se actualizo correctamente.',
                    'data'=>'Numero de filas afectadas: '.$respuesta,
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