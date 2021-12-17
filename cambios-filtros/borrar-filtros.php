<?php

include('conexion-filtros.php');
include("funciones-filtros.php");

if(isset($_POST["id_usuario"]))
{
	$imagen = obtener_nombre_imagen($_POST["id_usuario"]);
	if($imagen != '')
	{
		unlink("img/" . $imagen);
	}
	$stmt = $conexion->prepare(
		"DELETE FROM cambios_filtros WHERE id = :id"
	);
	$resultado = $stmt->execute(
		array(
			':id'	=>	$_POST["id_usuario"]
		)
	);
	
	if(!empty($resultado))
	{
		echo 'Registro borrado';
	}
}



?>

