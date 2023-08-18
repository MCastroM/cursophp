<?php
/*
Ejercicio 3 : Programa que compruebe si una variable esta vacia y de estarlo,
rellenerla con texto en minusculas y mostrarla en mayusculas y negrita
*/

echo "<h2>Comprueba variable que no este vacia y muestra su valor en mayuscula</h3>";

$texto="";

if($texto == ""){
    $texto ="La playa";
    echo "Se ingresa texto en la variable que esta vacia ".$texto."<br>";
    echo "Se muestra en mayusculas: ". strtoupper($texto);
}
