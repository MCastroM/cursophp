<?php
/*
Ejercicio 4 : Crear un script en PHP que tenga 4 variables, una de tipo array,
otra String, otra int, y otra booleana y que imprima un mensaje 
según el tipo de variable
*/


function tipoVariable($tipo){
    $resul = gettype($tipo);
    return $resul;
}

echo "<h2>Indica tipos de variable</h3>";

$coleccion = array("hola mundo", 88);
$texto = "variable tipo texto";
$num = 3;
$flag = true;

echo tipoVariable($coleccion)."\n";
echo tipoVariable($texto)."\n";
echo tipoVariable($flag)."\n";

