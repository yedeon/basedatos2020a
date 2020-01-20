<?php
                require 'SQLGlobal.php';




                 if($_server['request_method']=='get'){
                     try{
                         $respuesta = sqlglobal::selectarray("select * from bd2"); // semodifica esta linea decodigo
                        // echo json_encode($respuesta);
                         echo json_encode(array(
                             'respuesta'=>'200',
                             'estado' => 'se obtuvieron los datos correctamente',
                             'data'=>$respuesta,
                             'error'=>''
                         ));
                     }catch(pdoexception $e){
                         echo json_encode(array(
                                 'respuesta'=>'-1',
                                 'estado' => 'ocurrio un error, intentelo mas tarde',
                                 'data'=>'',
                                 'error'=>$e->getmessage())
                         );
                     }
                 }
            ?>