<?php
	require 'SQLGlobal.php';

	if($_SERVER['REQUEST_METHOD']=='GET'){
		try{
			//$datos = json_decode(file_get_contents("php://input"),true);

            $id = $datos["id"]; // obtener parametros POST
			$respuesta = SQLGlobal::selectArrayFiltro("SELECT * FROM bd2  WHERE id=?",
				array($id) 
			);//con filtro ("El tamaño del array debe ser igual a la cantidad de los '?'")
            echo json_encode(array(
                    'respuesta'=>'200',
                    'estado' => 'Se Filtro ok',
                    'data'=>'Nro registros afectados son: '.$respuesta, //. concatea en php // en +
                    'error'=>''
                ));
            }catch(PDOException $e){
                echo json_encode(array(
                    'respuesta'=>'-1',
                    'estado' => 'No EXISTE',
                    'data'=>'',
                    'error'=>$e->getMessage())
		
			);
		}
	}
?>
