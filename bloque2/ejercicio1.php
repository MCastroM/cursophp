<?php

/*
Ejercicio 1 : Escribir un script PHP que tenga un array con 8 enteros
y haga lo siguiente
- Recorrerlo y mostrarlo
- Ordenarlo y mostrarlo
- mostrar su longitud
- buscar algún elemento
*/

function mostrarArray($numeros){
    $resultado="";
    foreach ($numeros as $numero) {
        $resultado.=$numero."-";
    } 
    return $resultado;
}

echo "<h2>funciones en array de 8 números enteros</h3>";

$miarray = [5,4,8,9,11,10,3,2];
echo "<hr>";
echo "<h4>Recorro y muestro array</h4>";

echo mostrarArray($miarray);

echo "<hr>";
echo "<h4>Ordeno muestro array</h4>";
 
asort($miarray);
echo mostrarArray($miarray);

echo "<hr>";
echo "<h4>Muestro su longitud</h4>";
 
echo sizeof($miarray);

echo "<hr>";
echo "<h4>Busqueda del número 11</h4>";
 
echo array_search(11, $miarray);



