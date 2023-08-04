<?php
/*Ejercicio 2: Sacar los números pares que hay del 1 al 100 

*/

echo "<h1>Imprime números pares</h1>";
for($i=1;$i<=100;$i++){
    if($i%2==0){
        echo "Número par: $i<br>";
    }
}