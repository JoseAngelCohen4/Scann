<?php
header('Content-Type:application/json');
if(!empty($_GET['id_empleado'])){
    $query="SELECT * FROM empleados WHERE id_empleado = $_GET[id_empleado]";
    $Conecion=mysqli_connect("localhost","root","","nomina");
    $resultado=mysqli_query($Conecion,$query);
    $fila=mysqli_fetch_assoc($resultado);
    

    if($fila){
        $data['id_empleado']=$fila['id_empleado'];
        $data["nombre"] = "{$fila['nombre_empleado']} {$fila['ap1_empleado']} {$fila['ap2_empleado']}";
        $data["correo"] =$fila['correo_empleado'];
        $data["foto"] ="http://localhost/fotos/".$fila["foto_empleado"];
        print_r($data);
    }
    else{

    }
}