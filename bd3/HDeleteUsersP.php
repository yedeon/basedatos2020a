<?php
	require 'SQLGlobal.php';

	if($_SERVER['REQUEST_METHOD']=='POST'){
		try{
			$datos = json_decode(file_get_contents("php://input"),true);

            $id = $datos["id"]; // obtener parametros POST
			$respuesta = SQLGlobal::cudFiltro("DELETE FROM bd3  WHERE id=?",
				array($id) 
			);//con filtro ("El tamaño del array debe ser igual a la cantidad de los '?'")
            if($respuesta>0){
                echo json_encode(array(
                    'respuesta'=>'200',
                    'estado' => 'Se Elimino ok',
                    'data'=>'Nro registros afectados son: '.$respuesta, //. concatea en php // en +
                    'error'=>''
                ));
            }else{
                echo json_encode(array(
                    'respuesta'=>'100',
                    'estado' => 'No EXISTE',
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

<?php
