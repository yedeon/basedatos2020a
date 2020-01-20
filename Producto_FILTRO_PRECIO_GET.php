<?php
	require 'SQLGlobal.php';

	if($_SERVER['REQUEST_METHOD']=='GET'){		// en GET SE PONEN EN URL VA= ,pero hace loq pongas aqui >= > //unitynocharcha
		try{							
			$precio = $_GET['precio'];                      // obtener parametros GET confiltro
			//$respuesta = SQLGlobal::query("QUERY");//sin filtro ("No incluir filtros ni '?'")
			$respuesta = SQLGlobal::selectArrayFiltro(             // confiltro
                "select * from bd2 WHERE precio > ? ",     //confiltro      cambio bd y columna y> 
                            // queda asi en wwww         https://basedatos2020a.herokuapp.com/Producto_FILTRO_PRECIO.php?precio=1.9
				array($precio)           //confiltro  $precio
			);//con filtro ("El tamaño del array debe ser igual a la cantidad de los '?'")
			echo json_encode(array(
				'respuesta'=>'200',
				'estado' => 'Se obtuvieron los datos correctamente',
				'data'=>$respuesta,
				'error'=>''
			));
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