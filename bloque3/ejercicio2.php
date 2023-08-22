<?php
/*
Ejercicio 2 : 
1.- Una funcion
2.- Validar un emial con filter_var
3.- Recoger variable por GET y validarla
4.- Mostrar el resultado
*/


echo "<h2>Ejercicio de funciones GET</h3>";

function validarEmail($email){
    $status = "No valido";
    if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
        $status = "email valido";
    }
    return $status;
}

if(isset($_GET['email'])){
    echo validarEmail($_GET["email"]);
}else{
    echo "Pasa por GET un Email...";
}