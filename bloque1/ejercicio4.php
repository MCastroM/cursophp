<?php

/*
Ejercicio 4 : Recoguer dos numeros por la URL(parametro GET) y hacer todas las 
operaciones básicas de una calculadora (suma, resta, multiplicación y división)
de esos dos números.
*/

echo "<h2>Calculadora de dos números ingresados por URL (Parametro GET)</h3>";



// Operaciones matemáticas

if(isset($_GET['numero1']) && isset($_GET['numero2'])){

       $numero1 = $_GET['numero1'];
       $numero2 = $_GET['numero2'];


       echo "La suma de los números $numero1 + $numero2 es = ". ($numero1+$numero2)."<br>";
       echo "La resta de los números $numero1 - $numero2 es = ". ($numero1-$numero2)."<br>";
       echo "La multiplicaión de los números $numero1 * $numero2 es = ". ($numero1*$numero2)."<br>";
       echo "La división de los números $numero1 / $numero2 es = ". ($numero1/$numero2)."<br>";



}else{
       echo "<h1>Introducir correctamente los valores por la URL </h1>";
}
