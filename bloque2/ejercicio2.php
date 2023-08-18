<?php
/*
Ejercicio 2 : Escribir un script PHP que añada valores a un array mientras
 que su longitud sea menor a 120 y luego mostrarlo por pantalla
*/

echo "<h2>Añadir valores a un array hasta un largo de 120</h3>";

// declaro la variable  array $coleccion
$coleccion= array();

for($i = 0; $i <= 120; $i++){
    array_push($coleccion, "elemento-".$i);
}

foreach($coleccion as $valor){
    echo $valor."<br />";
}


