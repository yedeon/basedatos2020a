<?php
	require 'SQLGlobal.php';

	if($_SERVER['REQUEST_METHOD']=='POST'){
		try{
			$datos = json_decode(file_get_contents("php://input"),true);

            (int)$id = $datos["id"]; // obtener parametros POST
            //$ids =11;
			$respuesta = SQLGlobal::cudFiltro(
                "DELETE FROM bd2  WHERE id =?",
				array($ids) 
            );//con filtro ("El tamaño del array debe ser igual a la cantidad de los '?'")
            echo($id)
            // echo json_encode(array(
            //         'respuesta'=>'200',
            //         'estado' => 'Se Borro ok',
            //         'data'=>$respuesta, //. concatea en php // en +
            //         'error'=>''
            //     ))
            ;
            }catch(PDOException $e){
                echo($id)
                // echo json_encode(array(
                //     'respuesta'=>'-1',
                //     'estado' => 'No EXISTE',
                //     'data'=>'',
                //     'error'=>$e->getMessage())
		
                // )
                ;
		    }
	    }
?>
