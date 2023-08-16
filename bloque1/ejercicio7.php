<?php

/*
Ejercicio 7 : Hacer un programa que nuestre todos los números entre dos números 
que nos lleguen por URL ($_GET) además que muestre solo los números pares
*/

echo "<h2>Lista de números entre dos números ingresados por URL</h3>";

if(isset($_GET['numero1']) && isset($_GET['numero2'])){

    $numero1 = $_GET['numero1'];
    $numero2 = $_GET['numero2'];

    if($numero1 < $numero2){
        for($i=$numero1;$i<=$numero2;$i++){

            if($i%2 != 0){
                echo $i."<br>";
            }
        }
    }else{
        echo "El número 1 debe ser mayor al número 2";
    }

}else{
    echo "<h1>Introducir correctamente los valores por la URL </h1>";
}