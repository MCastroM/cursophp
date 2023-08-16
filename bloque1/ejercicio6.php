<?php

/*
Ejercicio 6 : mostrar tablas de multiplicar del 1 al 10
*/

echo "<h2>Tablas de multiplicar.</h3>";
echo"<hr>";

echo "<table border='1'>";
echo "<tr>";
    for($cabecera = 1;$cabecera <=12;$cabecera++){
        echo "<td>Tabla del $cabecera</td>";
    }
echo "</tr>";
echo "<tr>";
    for($i = 1;$i <= 12; $i++){
        echo "<td>";
            for($x = 1;$x <= 12;$x++){
                echo "$i x $x = ".($i*$x)."<br>";
            }
        echo "</td>";
    }
echo "</tr>"; 

echo"</table>";


