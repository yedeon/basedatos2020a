
                <?php
                require 'SQLGlobal.php';

                if($_SERVER['REQUEST_METHOD']=='POST'){
                    try{
                        $datos=json_decode(file_get_contents("php://input"),true);
                        $palabra = $datos["palabra"];                      // obtener parametros GET confiltro
                        //$respuesta = SQLGlobal::query("QUERY");//sin filtro ("No incluir filtros ni '?'")
                        $respuesta = SQLGlobal::selectArrayFiltro(             // confiltro
                            "select * from bd2 where lower(descripcion) LIKE lower(?)", //espera  {"palabra":"c"}  //lower('Ch%')",     //confiltro      cambio bd y columna y> 
                                        // queda asi en wwww         https://basedatos2020a.herokuapp.com/Producto_FILTRO_PRECIO.php?precio=1.9
                            array($palabra.'%')           //confiltro  $precio
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