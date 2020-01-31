<?php
            require 'SQLGlobal.php';

            if($_SERVER['REQUEST_METHOD']=='GET'){
                try{
                    $respuesta = SQLGlobal::selectArray("SELECT count(*)  FROM bd3 ");
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
            ?>
