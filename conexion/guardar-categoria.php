<?php
if(isset($_POST)){
    // Conexión a la Base de datos
    require_once 'includes/conexion.php';

    // funcion ternaria, para comprobar si llega nombre
    $nombre = isset($_POST['nombre']) ? pg_escape_string($db, $_POST['nombre']) : false;

    //Array de errores
    $errores = array();

    // Validar antes de ingresar a la base de datos
    if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/",$nombre)){
        $nombre_validado= true;    
    }else{
        $nombre_validado= false;
        $errores['nombre']="El nombre no es valido";
    }

    //Verifico que no hay errores y grabo en la base de datos
    if(count($errores) == 0){
        $sql = "INSERT INTO categorias (nombre) VALUES ('$nombre');";
        $guardar = pg_query($db,$sql);

    }
}
header("Location: index.php");