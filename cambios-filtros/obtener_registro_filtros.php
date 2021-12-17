<?php

include("conexion-filtros.php");
include("funciones-filtros.php");

if (isset($_POST["id_usuario"])) {
    $salida = array();
    $stmt = $conexion->prepare("SELECT * FROM usuarios WHERE id = '".$_POST["id_usuario"]."' LIMIT 1");
    $stmt->execute();
    $resultado = $stmt->fetchAll();
    foreach($resultado as $fila){
        $salida["cliente"] = $fila["cliente"];
        $salida["direccion_instalacion"] = $fila["direccion_instalacion"];
        $salida["historial"] = $fila["historial"];
        $salida["fecha_ultimo_cambio"] = $fila["fecha_ultimo_cambio"];
        $salida["fecha_proximo_cambio"] = $fila["fecha_proximo_cambio"];
     
    }

    echo json_encode($salida);
}



