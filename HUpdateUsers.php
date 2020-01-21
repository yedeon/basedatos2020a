<?php
	require 'SQLGlobal.php';

	if($_SERVER['REQUEST_METHOD']=='POST'){
		try{
			$datos= json_decode(file_get_contents("php://input"),true);

            (int)$id=$datos["id"]; // obtener parametros GET
            $descripcion=$datos["descripcion"];
            $precio=$datos["precio"];
            $categoria=$datos["categoria"]; 
			$respuesta = SQLGlobal::cudFiltro(
				"UPDATE bd2 SET descripcion=?,precio=?,categoria=? WHERE id=?",
				array($id,$descripcion,$precio,$categoria)
            );//con filtro ("El tamaño del array debe ser igual a la cantidad de los '?'")
            if($respuesta>0){
                // echo json_encode(array(
                //     'respuesta'=>'200',
                //     'estado' => 'Se actualizo correctamente el producto',
                //     'data'=>'Numero de filas afectadas: '.$respuesta,
                //     'error'=>''
                // ));
                echo("1 ".$id." ".$descripcion." ".$precio." ".$categoria);
            }else{
                // echo json_encode(array(
                //     'respuesta'=>'100',
                //     'estado' => 'No se actualizo correctamente.',
                //     'data'=>'Numero de filas afectadas: '.$respuesta,
                //     'error'=>''
                // ));
                echo("2 ".$id." ".$descripcion." ".$precio." ".$categoria);
            }
		}catch(PDOException $e){
			// echo json_encode(
			// 	array(
			// 		'respuesta'=>'-1',
			// 		'estado' => 'Ocurrio un error, intentelo mas tarde',
			// 		'data'=>'',
			// 		'error'=>$e->getMessage())
            // );
            echo("3 ".$id." ".$descripcion." ".$precio." ".$categoria);
		}
	}

?>