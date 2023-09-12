<?php 
if(isset($_POST)){

        // Conexión a la Base de datos
        require_once 'includes/conexion.php';
        //session_start();

        //validar si tiene valor las variables con el operador ternario de PHP
        $nombre     = isset($_POST['nombre']) ? $_POST['nombre'] : false;
        $apellidos  = isset($_POST['apellidos']) ? $_POST['apellidos'] : false;
        $email      = isset($_POST['email']) ?trim($_POST['email']) : false;
        $password   = isset($_POST['password']) ? $_POST['password'] : false;
  
    //Array de errores
    $errores = array();

    // Validar antes de ingresar a la base de datos
    if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/",$nombre)){
        $nombre_validado= true;    
    }else{
        $nombre_validado= false;
        $errores['nombre']="El nombre no es valido";
    }
    if(!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/",$apellidos)){
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

    // Verifico que no haya errorees (en la variable errores)
    $guardar_usuario = 0;
    if(count($errores) == 0){
        $guardar_usuario = true;

        // Cifrar la contraseña
        $password_segura = password_hash($password, PASSWORD_BCRYPT, ['cost'=>4]);
        
        // Inserto a la base de datos
        $sql = "INSERT INTO  usuarios (nombre,apellido,email,password,fecha)VALUES('$nombre', '$apellidos', '$email', '$password_segura', current_date)";
        $guardar = pg_query($db,$sql);

        if($guardar){
            $_SESSION['completado'] = "El registro se ha compelatdo con exito";
        }else{
            $_SESSION['errores']['general']= "Fallo al guardar usuario!!" ;

        }
    }else{
        $_SESSION['errores'] = $errores; 
    }
}

header('Location: index.php');