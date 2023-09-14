<?php 
if(isset($_POST)){

        // Conexión a la Base de datos
        require_once 'includes/conexion.php';

        //validar si tiene valor las variables con el operador ternario de PHP, recogemos los valores del formulario
        $nombre     = isset($_POST['nombre']) ? $_POST['nombre'] : false;
        $apellidos  = isset($_POST['apellidos']) ? $_POST['apellidos'] : false;
        $email      = isset($_POST['email']) ?trim($_POST['email']) : false;
        
  
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

    // Verifico que no haya errorees (en la variable errores)
    $guardar_usuario = false;

 
    if(count($errores) == 0){
        $guardar_usuario = true;
   
        // Actualizar usuario en la tabla de la BD
        $usuario = $_SESSION['usuario'];

        $sql =  "UPDATE usuarios SET ".
                "nombre = '$nombre', ".
                "apellido = '$apellidos',".
                "email = '$email' ".
                "WHERE id = ".$usuario['id'];
        
        $guardar = pg_query($db,$sql);

        if($guardar){

            $_SESSION['completado'] = "Tus datos se han actualizado con exito";
            $_SESSION['usuario']['nombre'] = $nombre;
            $_SESSION['usuario']['apellido'] = $apellidos;
            $_SESSION['usuario']['email'] = $email;
        }else{
            $_SESSION['errores']['general']= "Fallo al actualizar tus datos!!" ;

        }
    }else{
        $_SESSION['errores'] = $errores; 
    }
}

header('Location: mis-datos.php');