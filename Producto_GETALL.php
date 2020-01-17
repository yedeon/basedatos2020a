<?php
	require 'SQLGlobal.php';

	if($_SERVER['REQUEST_METHOD']=='GET'){
		try{
			$respuesta = SQLGlobal::selectArray("select * from bd2"); // semodifica esta linea decodigo
			echo json_encode(array(
				'respuesta'=>'200',
				'estado' => 'Se obtuvieron los datos correctamente',
				'data'=>$respuesta,
				'error'=>''
			)
			//echo "logeado okss";
			);
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