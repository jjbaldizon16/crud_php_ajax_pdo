<?php

include("conexion.php");
include("funciones.php");

if ($_POST["operacion"] == "Crear") {
    $imagen = '';
    if ($_FILES["imagen_usuario"]["name"] != '') {
        $imagen = subir_imagen();
    }
    $stmt = $conexion->prepare("INSERT INTO usuarios(cedula, nombre, apellidos, imagen, telefono, telefono2, email, direccion_casa, direccion_trabajo)VALUES(:cedula, :nombre, :apellidos, :imagen, :telefono, :telefono2, :email, :direccion_casa, :direccion_trabajo)");

    $resultado = $stmt->execute(
        array(
            ':cedula'    => $_POST["cedula"],
            ':nombre'    => $_POST["nombre"],
            ':apellidos'    => $_POST["apellidos"],
            ':imagen'    => $imagen,
            ':telefono'    => $_POST["telefono"],
            ':telefono2'    => $_POST["telefono2"],
            ':email'    => $_POST["email"],
            ':direccion_casa'    => $_POST["direccion_casa"],
            ':direccion_trabajo'    => $_POST["direccion_trabajo"]
            
            
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


    $stmt = $conexion->prepare("UPDATE usuarios SET cedula=:cedula, nombre=:nombre, apellidos=:apellidos, imagen=:imagen, telefono=:telefono, telefono2=:telefono2, email=:email, direccion_casa=:direccion_casa, direccion_trabajo=:direccion_trabajo WHERE id = :id");

    $resultado = $stmt->execute(
        array(
            ':cedula'    => $_POST["cedula"],
            ':nombre'    => $_POST["nombre"],
            ':apellidos'    => $_POST["apellidos"],
            ':imagen'    => $imagen,
            ':telefono'    => $_POST["telefono"],
            ':telefono2'    => $_POST["telefono2"],
            ':email'    => $_POST["email"],
            ':direccion_casa'    => $_POST["direccion_casa"],
            ':direccion_trabajo'    => $_POST["direccion_trabajo"],
            ':id'    => $_POST["id_usuario"]
        )
    );

    if (!empty($resultado)) {
        echo 'Registro actualizado';
    }
}