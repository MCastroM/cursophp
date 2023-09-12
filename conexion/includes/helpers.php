<?php

function mostrarError($errores, $campo){
<<<<<<< HEAD
    $alerta ='';
    if(isset($errores[$campo]) && !empty($campo)){
        $alerta = "<div class='alerta alerta-error'>".$errores[$campo].'</div>';
    }

    return $alerta;
}
function borrarErrores(){
    $_SESSION['errores'] = null;
    unset($_SESSION['errores']);
    if(isset($_SESSION['completado'])){
        $_SESSION['completado'] = null;
        unset($_SESSION['completado']);
    }
=======
    $alerta = '';
    if(isset($errores[$campo]) && !empty($campo)){
        $alerta = "<div class='alerta alerta-error'>".$errores[$campo].'</div>';
    }
    return $alerta;
}

function borrarErrores(){
    $_SESSION['errores'] = null;
    $borrado = session_unset($_SESSION['errores']);
    return $borrado;
>>>>>>> 6cded3fb0be917373596d8c380f515996f645749
}