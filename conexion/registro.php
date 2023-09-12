<<<<<<< HEAD
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
=======
<?php 
session_start();
if(isset($_POST)){
    //validar si tiene valor las variables con el operador ternario de PHP
    $nombre     = isset($_POST['nombre']) ? $_POST['nombre'] : false;
    $apellidos  = isset($_POST['apellidos']) ? $_POST['apellidos'] : false;
    $email      = isset($_POST['email']) ? $_POST['email'] : false;
    $password   = isset($_POST['password']) ? $_POST['password'] : false;
}

//Array de errores
$errores = array();

// Validar nates de ingresar a la base de datos
if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/",$nombre)){
    $nombre_validado= true;    
}else{
    $nombre_validado= false;
    $errores['nombre']="El nombre no es valido";
}
if(!empty($apellidos) && !is_numeric($apelidos) && !preg_match("/[0-9]/",$apellidos)){
    $apellidos_validado= true;    
}else{
    $apellidos_validado= false;
    $errores['apellidos']="El apellido no es valido";
}
if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
    $email_validado= true;    
}else{
    $email_validado= false;
    $errores['email']="El mail no es valido";
}
if(!empty($password)){
    $password_validado= true;    
}else{
    $password_validado= false;
    $errores['password']="El password esta vacio";
}

// Verifico que no haya errorees en la variable errores
$guardar_usuario = 0;
if(count($errores) == 0){
    $guardar_usuario = true;
}else{
    $_SESSION['errores'] = $errores;
    header('Location: index.php');
}


>>>>>>> 6cded3fb0be917373596d8c380f515996f645749
