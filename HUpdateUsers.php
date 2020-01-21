<?php
	require 'SQLGlobal.php';

	if($_SERVER['REQUEST_METHOD']=='POST'){
		try{
			$datos= json_decode(file_get_contents("php://input"),true);

            
            $descripcion=$_POST["descripcion"];
            $precio=$_POST["precio"];
            $categoria=$_POST["categoria"]; 
            (int)$id=$_POST["id"]; // obtener parametros GET
			$respuesta = SQLGlobal::cudFiltro(
				"UPDATE bd2 SET descripcion=?,precio=?,categoria=? WHERE id=?",//asi el orden previorenglones
				array($descripcion,$precio,$categoria,$id)
            );//con filtro ("El tamaño del array debe ser igual a la cantidad de los '?'")
            if($respuesta>0){
                // echo json_encode(array(
                //     'respuesta'=>'200',
                //     'estado' => 'Se actualizo correctamente el producto',
                //     'data'=>'Numero de filas afectadas: '.$respuesta,
                //     'error'=>''
                // ));
                echo("a ".$id." ".$descripcion." ".$precio." ".$categoria);
            }else{
                // echo json_encode(array(
                //     'respuesta'=>'100',
                //     'estado' => 'No se actualizo correctamente.',
                //     'data'=>'Numero de filas afectadas: '.$respuesta,
                //     'error'=>''
                // ));
                echo("b ".$id." ".$descripcion." ".$precio." ".$categoria);
            }
		}catch(PDOException $e){
			// echo json_encode(
			// 	array(
			// 		'respuesta'=>'-1',
			// 		'estado' => 'Ocurrio un error, intentelo mas tarde',
			// 		'data'=>'',
			// 		'error'=>$e->getMessage())
            // );
            echo("c ".$id." ".$descripcion." ".$precio." ".$categoria);
		}
	}

?>