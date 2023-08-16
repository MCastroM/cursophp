<?php

/*
Ejercicio 5 : Hacer un programa que nuestre todos los números entre dos números 
que nos lleguen por URL ($_GET)
*/

echo "<h2>Lista de números entre dos números ingresados por URL</h3>";

if(isset($_GET['numero1']) && isset($_GET['numero2'])){

    $numero1 = $_GET['numero1'];
    $numero2 = $_GET['numero2'];

    for($i=$numero1;$i<=$numero2;$i++){
        echo $i."<br>";
    }

}else{
    echo "<h1>Introducir correctamente los valores por la URL </h1>";
}