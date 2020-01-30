<?php
	require 'SQLGlobal.php';

	if($_SERVER['REQUEST_METHOD']=='POST'){
		try{
			$datos = json_decode(file_get_contents("php://input"),true);

           // $id = $_POST["id"]; // obtener parametros POST
            $descripcion = $_POST["descripcion"]; 
            $precio = $_POST["precio"]; 
            $categoria = $_POST["categoria"]; 
            //$ids =11;
			$respuesta = SQLGlobal::cudFiltro(
                "INSERT INTO bd3  values (?,?,?)",
				array($descripcion,$precio,$categoria));//con filtro ("El tamaño del array debe ser igual a la cantidad de los '?'")
                    if($respuesta>0){
                        echo json_encode(array(
                            'respuesta'=>'200',
                            'estado' => 'Se inserto ok',
                            'data'=>'Nro registros afectados son: '.$respuesta,
                            'error'=>''
                        ));
                    }else{
                        echo json_encode(array(
                            'respuesta'=>'100',
                            'estado' => 'No se registro',
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
