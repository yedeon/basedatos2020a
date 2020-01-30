<?php
	require 'SQLGlobal.php';

	if($_SERVER['REQUEST_METHOD']=='POST'){
		try{
			$datos= json_decode(file_get_contents("php://input"),true);

            
            $id=$_POST["id"]; // obtener parametros GET
            $precio=$_POST["precio"];
            $categoria=$_POST["categoria"]; 
            
            $descripcion=$_POST["descripcion"];
			$respuesta = SQLGlobal::cudFiltro(
				"UPDATE bd2 SET id=?,precio=?,categoria=? WHERE descripcion=?",
				array($id,$precio,$categoria,$descripcion)//renglones descen y dercha mismo orden de $xx
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