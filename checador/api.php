<?php
header('Content-Type:application/json');
if(!empty($_GET['id_empleado']))
{
    $query="SELECT * FROM empleados WHERE id_empleado = $_GET[id_empleado]";
    $Conecion=mysqli_connect("localhost","root","","nomina");
    $resultado=mysqli_query($Conecion,$query);
    $fila=mysqli_fetch_assoc($resultado);
    

    if($fila){
        $data['id_empleado']=$fila['id_empleado'];
        $data["nombre"] = "{$fila['nombre_empleado']} {$fila['ap1_empleado']} {$fila['ap2_empleado']}";
        $data["correo"] =$fila['correo_empleado'];
        $data["foto"] ="http://localhost/fotos/".$fila["foto_empleado"];
        response(200,$data);
    }
    else{
        $data['id_empleado']="";
        $data["nombre"] = "";
        $data["correo"] ="";
        $data["foto"] ="";
        response(300,$data);
    }   
}
else{
        $data['id_empleado']="";
        $data["nombre"] = "";
        $data["correo"] ="";
        $data["foto"] ="";
        response(400,$data);
    }

    function response ($status,$data){
        header("HTTP/1.1 ".$status);
        $response["status"]=$status;
        $response["id_empleado"]=$data["id_empleado"];
        $response["id_nombre"]=$data["nombre"];
        $response["id_correo"]=$data["correo"];
        $response["id_foto"]=$data["foto"];
        $json_encode=json_encode($response);
        echo $json_encode;

    }