<?php

include("conexion-filtros.php");
include("funciones-filtros.php");

if ($_POST["operacion"] == "Crear") {
    
 
    $stmt = $conexion->prepare("INSERT INTO cambios_filtros(direccion_instalacion, historial, fecha_ultimo_cambio, fecha_proximo_cambio)VALUES(:direccion_instalacion, :historial, :fecha_ultimo_cambio, :fecha_proximo_cambio)");

    $resultado = $stmt->execute(
        array(
            ':direccion_instalacion'    => $_POST["direccion_instalacion"],
            ':historial'    => $_POST["historial"],
            ':fecha_ultimo_cambio'    => $_POST["fecha_ultimo_cambio"],
            ':fecha_proximo_cambio'    => $_POST["fecha_proximo_cambio"]
            
        )
    );

    if (!empty($resultado)) {
        echo 'Registro creado';
    }
}


if ($_POST["operacion"] == "Editar") {
    $imagen = '';
    if ($_FILES["imagen_usuario"]["name"] != '') {
        $imagen = subir_imagen();
    }else{
        $imagen = $_POST["imagen_usuario_oculta"];
    }


    $stmt = $conexion->prepare("UPDATE cambios_filtros SET cliente=:cliente, direccion_instalacion=:direccion_instalacion, historial=:historial, fecha_ultimo_cambio=:fecha_ultimo_cambio, fecha_proximo_cambio=:fecha_proximo_cambio WHERE id = :id");

    $resultado = $stmt->execute(
        array(
            ':cliente'    => $_POST["cliente"],
            ':direccion_instalacion'    => $_POST["direccion_instalacion"],
            ':historial'    => $_POST["historial"],
            ':fecha_ultimo_cambio'    => $_POST["fecha_ultimo_cambio"],
            ':fecha_proximo_cambio'    => $_POST["fecha_proximo_cambio"],
            ':id'    => $_POST["id_usuario"]
        )
    );

    if (!empty($resultado)) {
        echo 'Registro actualizado';
    }
}