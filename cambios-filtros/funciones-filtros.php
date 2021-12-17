<?php

    

    

    function obtener_todos_registros(){
        include('conexion-filtros.php');
        $stmt = $conexion->prepare("SELECT * FROM cambios_filtros");
        $stmt->execute();
        $resultado = $stmt->fetchAll(); 
        return $stmt->rowCount();       
    }






    