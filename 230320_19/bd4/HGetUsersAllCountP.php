<!-- <?php
            require 'SQLGlobal.php';

            if($_SERVER['REQUEST_METHOD']=='GET'){
                try{
                    $respuesta = SQLGlobal::selectArray("SELECT count(*)  FROM bd4 WHERE nroemp='4' ");
                    echo json_encode(array(
                            'respuesta'=>'200',
                            'estado' => 'Se Filtro ok',
                            'data'=>$respuesta, //. concatea en php // en +
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
?> -->

<?php
	require 'SQLGlobal.php';

	if($_SERVER['REQUEST_METHOD']=='POST'){
		try{
			$datos = json_decode(file_get_contents("php://input"),true);

			$nroemp = $datos["4"]; // obtener parametros GET
			//$respuesta = SQLGlobal::query("QUERY");//sin filtro ("No incluir filtros ni '?'")
			$respuesta = SQLGlobal::selectArrayFiltro(
				"QUERY WHERE nroemp='4'",
				array("id","nroemp","...")
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

