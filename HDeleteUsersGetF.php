<?php
	require 'SQLGlobal.php';

	if($_SERVER['REQUEST_METHOD']=='POST'){
		try{
			$datos = json_decode(file_get_contents("php://input"),true);

            (int)$id = $_POST["id"]; // obtener parametros POST
            //$ids =11;
			$respuesta = SQLGlobal::cudFiltro(
                "DELETE FROM bd2  WHERE id =?",
				array((int)$id) 
            );//con filtro ("El tamaño del array debe ser igual a la cantidad de los '?'")
            echo($id." 1")
            // echo json_encode(array(
            //         'respuesta'=>'200',
            //         'estado' => 'Se Borro ok',
            //         'data'=>$respuesta, //. concatea en php // en +
            //         'error'=>''
            //     ))
            ;
            }catch(PDOException $e){
                echo($id." 2")
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
