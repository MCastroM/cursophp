<?php
/*
Ejercicio 1 : Crear una sesión que aumente el valor en uno o disminuya en uno
en función de si el parametro get counter está a uno o cero
*/

session_start();


echo "<h2>Ejercicio de sesiones</h3>";

if(!isset($_SESSION["numero"])){
    $_SESSION['numero'] = 0;
}

if(isset($_GET['counter']) && $_GET['counter']==1){
    $_SESSION['numero'] ++;
}
if(isset($_GET['counter']) && $_GET['counter']==0){
    $_SESSION['numero'] --;
}

?>

<h1>El valor de la sesíon umero es: <?=$_SESSION['numero']?></h1>
<a href="ejercicio1.php?counter=1">Aumentar valor</a><br/>
<a href="ejercicio1.php?counter=0">Diminuye valor</a>


