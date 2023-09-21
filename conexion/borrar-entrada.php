<?php
require_once 'includes/conexion.php';

// verifico que exista una session y que exista el parametro id de la entrada a borrar $_GET['id]
if(isset($_SESSION['usuario']) && isset($_GET['id'])){
    $entrada_id = $_GET['id'];
    $usuario_id = $_SESSION['usuario']['id'];


    $sql    = "DELETE FROM entradas WHERE usuario_id = $usuario_id AND id = $entrada_id";
    $borrar = pg_query($db, $sql); 
}

header("Location: index.php");
