<?php
require 'SQLGlobal.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
    try{
        $datos = json_decode(file_get_contents("php://input"),true);

        (int)$id = $datos["id"]; // obtener parametros POST
        $descripcion = $datos["descripcion"]; 
        (int)$precio = $datos["precio"]; 
        $categoria = $datos["categoria"]; 
        //$ids =11;
        $respuesta = SQLGlobal::cudFiltro("UPDATE bd2 SET descripcion =?,precio=?,categoria=? WHERE id=?",
            array($descripcion,(int)$precio,$categoria,(int)$id)
        );//con filtro ("El tamaño del array debe ser igual a la cantidad de los '?'")
        if($respuesta>0){
            echo json_encode(array(
                'respuesta'=>'200',
                'estado' => 'Se Update ok',
                'data'=>'Nro Filas afectadas; '.$respuesta,
                'error'=>''
            ));
        }else{
            echo json_encode(array(
                'respuesta'=>'100',
                'estado' => 'No Update ok',
                'data'=>'Nro Filas afectadas; '.$respuesta,
                'error'=>''
            ));
        }
        }catch(PDOException $e){
            echo json_encode(array(
                'respuesta'=>'-1',
                'estado' => 'No EXISTE',
                'data'=>'',
                'error'=>$e->getMessage()
            ));
        }
    }
?>
