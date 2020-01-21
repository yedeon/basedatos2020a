<?php
require 'SQLGlobal.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
    try{
        $datos = json_decode(file_get_contents("php://input"),true);

        (int)$id = $_POST["id"]; // obtener parametros POST
        $descripcion = $_POST["descripcion"]; 
        (int)$precio = $_POST["precio"]; 
        $categoria = $_POST["categoria"]; 
        //$ids =11;
        $respuesta = SQLGlobal::cudFiltro("UPDATE bd2 SET id=? ,descripcion =?,precio=?,categoria=? WHERE id=?");
            array((int)$id,$descripcion,$precio,$categoria) ;
        //con filtro ("El tamaño del array debe ser igual a la cantidad de los '?'")
        echo json_encode(array(
                'respuesta'=>'200',
                'estado' => 'Se Borro ok',
                'data'=>$respuesta, //. concatea en php // en +
                'error'=>''
            ));
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

try{
                    $datos = json_decode(file_get_contents("php://input"),true);

                    (int)$id = $_POST["id"]; // obtener parametros POST
                    $descripcion = $_POST["descripcion"]; 
                    (int)$precio = $_POST["precio"]; 
                    $categoria = $_POST["categoria"]; 
                    //$ids =11;
                    $respuesta = SQLGlobal::cudFiltro(
                        "INSERT INTO bd2  values (?,?,?,?)",
                        array($id,$descripcion,$precio,$categoria));//con filtro ("El tamaño del array debe ser igual a la cantidad de los '?'")
                            if($respuesta>0){
                                echo json_encode(array(
                                    'respuesta'=>'200',
                                    'estado' => 'Se inserto ok',
                                    'data'=>'Nro registros afectados son: '.$respuesta,
                                    'error'=>''
                                ));