<?php
                require 'SQLGlobal.php';
                 IF($_SERVER['REQUEST_METHOD']=='GET'){
                 
                     try{
                         $respuesta = SQLGlobal::selectArray("SELECT * FROM bd2"); // semodifica esta linea decodigo
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