<?php

include("conexion.php");
include("funciones.php");

if (isset($_POST["id_usuario"])) {
    $salida = array();
    $stmt = $conexion->prepare("SELECT * FROM usuarios WHERE id = '".$_POST["id_usuario"]."' LIMIT 1");
    $stmt->execute();
    $resultado = $stmt->fetchAll();
    foreach($resultado as $fila){
        $salida["cedula"] = $fila["cedula"];
        $salida["nombre"] = $fila["nombre"];
        $salida["apellidos"] = $fila["apellidos"];
        $salida["telefono"] = $fila["telefono"];
        $salida["telefono2"] = $fila["telefono2"];
        $salida["email"] = $fila["email"];
        $salida["direccion_casa"] = $fila["direccion_casa"];
        $salida["direccion_trabajo"] = $fila["direccion_trabajo"];
        if ($fila["imagen"] != "") {
            $salida["imagen_usuario"] = '<img src="img/' . $fila["imagen"] . '"  class="img-thumbnail" width="100" height="50" /><input type="hidden" name="imagen_usuario_oculta" value="'.$fila["imagen"].'" />';
        }else{
            $salida["imagen_usuario"] = '<input type="hidden" name="imagen_usuario_oculta" value="" />';
        }
    }

    echo json_encode($salida);
}