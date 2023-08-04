<?php
/*Ejercicio 3: Escribir un programa que imprima pore pantalla los cuadrados de los 40 primeros 40 
primeros numeros  naturales
PD: Utilizar bucle while
*/

echo "<h1>Imprime un número y su cuadrado</h1>";
$contador=1;
while ($contador<=40){
    echo "Número : $contador |  : ". $contador*$contador."<br>";
    $contador++;

}
