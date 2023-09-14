<?php
if(isset($_POST)){
    // Conexión a la Base de datos
    require_once 'includes/conexion.php';

    // funcion ternaria, para comprobar si llega nombre, limpia los datos con el escape_string
    $titulo = isset($_POST['titulo']) ? pg_escape_string($db, $_POST['titulo']) : false;
    $descripcion = isset($_POST['descripcion']) ? pg_escape_string($db, $_POST['descripcion']) : false;
    $categoria = isset($_POST['categoria']) ? (int)$_POST['categoria'] : false;
    $usuario = $_SESSION['usuario']['id'];

    //Array de errores
    $errores = array();

    // Validar antes de ingresar a la base de datos
    if(!empty($titulo)){
        $titulo_validado= true;    
    }else{
        $titulo_validado= false;
        $errores['titulo']="El titulo no es valido";
    }

    if(!empty($descripcion)){
        $descripcion_validado= true;    
    }else{
        $descripcion_validado= false;
        $errores['descripcion']="El descripcion no es valido";
    }

    if(!empty($categoria) && is_numeric($categoria)){
        $categoria_validado= true;    
    }else{
        $categoria_validado= false;
        $errores['categoria']="El categoria no es valido";
    }

    //Verifico que no hay errores y grabo en la base de datos
    if(count($errores) == 0){
        $sql = "INSERT INTO entradas (usuario_id,categoria_id,titulo,descripcion,fecha) VALUES ('$usuario','$categoria','$titulo','$descripcion', current_date)";
        $guardar = pg_query($db,$sql);
        header("Location: index.php");
// var_dump(pg_last_error($guardar));
// die();

    }else{
        $_SESSION["errores_entrada"] = $errores;
        header("Location: crear-entradas.php");
    }
}
