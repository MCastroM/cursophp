<?php

/*
Ejercicio 3 : Escribir un programa que imprima por pantalla los cuadrados
de los 40 primero númros naturales (un número multiplicado por si mismo)
*/

echo "<h2>Cuadrado de los primeros 40 números</h3>";

// Efectuado con ciclo for
/*for($i=1; $i<=40; $i++){
    
       echo "Numero $i cuadrado : ".($i*$i)."<br>"; 
    
}
*/


// Efectuado con el ciclo while
$contador = 0;
while($contador <= 40){
    echo "Numero $contador cuadrado : ".($contador*$contador)."<br>";
    $contador++;
}