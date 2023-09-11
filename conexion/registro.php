<?php


if(isset($_POST)){
    require_once 'includes/conexion.php';

    if(!isset($_SESSION)){
        session_start();
    }
    

    // Valor terniario de PHP Recogo los valores del formulario de registro
    $nombre     = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;
    $apellidos  = isset($_POST['apellidos']) ? mysqli_real_escape_string($db,$_POST['apellidos']) : false;
    $email      = isset($_POST['email']) ? $_POST['email'] : false;
    $password   = isset($_POST['password']) ? mysqli_real_escape_string($db,$_POST['password']) : false;

    // Array para registrar errores
    $errores = array();

    // Validar los datos antes de guardarlos en la base de datos
    // Valido Nombre
    if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
        $nombre_validado = true;
    }else{
        $nombre_validado = false;
        $errores['nombre'] = "Nombre no valido";
    }
    // Valido Apellido
    if(!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos)){
        $apellidos_validado = true;
    }else{
        $apellidos_validado = false;
        $errores['apellidos'] = "Apellido no valido";
    }
    // Valido Email
    if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
        $email_validado = true;
    }else{
        $email_validado = false;
        $errores['email'] = "Email no valido";
    }
    // Valido Email
    if(!empty($password) ){
        $password_validado = true;
    }else{
        $password_validado = false;
        $errores['password'] = "password esta vacia";
    }
    
    // Verificando que los datos de registro esten validados para ingresar en BD
    if(count($errores)==0){
        
        // Cifrar contraseña
        $password_segura = password_hash($password, PASSWORD_BCRYPT,['COST'=>4]);

        //Insertar usuario en la base de datos
        $sql = "INSERT INTO usuarios values(null, '$nombre', '$apellidos', '$password_segura', '$email', CURDATE());";
        $guardar = mysqli_query($db, $sql);

        // var_dump(mysqli_error($db));
        // die();

        if($guardar){
            $_SESSION['completado'] = "El registro se inserto con exito!!";
        }else {
            $_SESSION['errores']['general'] = "Fallo al guardar el ususario!!";
        }

    }else {
        // datos con errores no se inserta.
        $_SESSION['errores'] = $errores;
    }
    
}

header('Location: index.php');
