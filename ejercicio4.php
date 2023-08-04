<?php
/*Ejercicio 4: Recoger dos números por la URL (Parametros GET) y hacer todas las operaciones
básicas de una calculadora (suma, resta, multiplicación y división) de esos números 
*/

echo "<h1>Imprime dos números y sus operaciones matemáticas, ingresados por URL</h1>";



if(isset($_GET['numero1']) && isset($_GET['numero2'])) {

    $numero1 = $_GET['numero1'];
    $numero2 = $_GET['numero2'];

    
    echo "<h2>Los números son: $numero1 y $numero2<br/>";
    echo "<h3>Suma          : ". ($numero1+$numero2)."<br/>";
    echo "<h3>Resta         : ". ($numero1-$numero2)."<br/>";
    echo "<h3>Multiplicación: ". ($numero1*$numero2)."<br/>";
    echo "<h3>División      : ". ($numero1/$numero2)."<br/>";

}else{
    echo "<h1>Introduce correctamente los valores por la URL</h1>";
}