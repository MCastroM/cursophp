<?php

/*
Ejercicio 2 : Escribir un script PHP que nos muestre por pantalla todos
los números pares que hay del 1 al 100
*/

echo "<h2>Números pares del 1 al 100</h3>";

for($i=1; $i<=100; $i++){
    if($i % 2 == 0){
       echo "Numero par : $i"."<br>"; 
    }

}