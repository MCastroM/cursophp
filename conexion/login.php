<?php
// Inicaiar session y conexion a BD
require_once 'includes/conexion.php';

// Recoger datos del formulario
if(isset($_POST)){
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // comprovar la contraseña
    $sql   = "SELECT * FROM usuarios WHERE email = '$email'";
    $login = pg_query($db, $sql);

    if($login && pg_num_rows($login) == 1){
        $usuario = pg_fetch_assoc($login);

        // compruebo la contraseña
        $verify = password_verify($password, $usuario['password']);
        
        if($verify){
            // Usuario logeado
            $_SESSION['usuario'] = $usuario;

            if(isset($_SESSION['error_login'])){
                unset($_SESSION['error_login']);
            }
        }else{
            //Mensaje de error
            $_SESSION['error_login'] = "Login Incorrecto";
        }
    }else{
        // Mensaje de error
        $_SESSION['error_login'] = "Login Incorrecto";
        
    }

}
//Redirigir al index.php
header('Location: index.php');
