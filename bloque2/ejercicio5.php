<?php
/*
Ejercicio 5 : Crear un array con el contenido de la tabla
ACCION  AVENTURA    DEPORTES
GTA     ASSASIANS   FIFA 19
COD     CRASH       PES 19
PUGB    Prince of   MOTO GP
        Persia

Cada fila debe ir en un archivo separado
*/

echo "<h2>Tablas con tipos de juegos</h3>";

$tabla = array(
    "ACCION"    => array("GTA","Call of Duty", "PUGB"),
    "AVENTURA"  => array("Assasians Cred", "Crash Bandicoot", "Prince of Persia"),
    "DEPORTES"  => array("Fifa 19", "Pes 19", "Moto 19")
);

$categorias = array_keys($tabla);
?>

<table border="1">
    <?php require_once 'include/encabezado.php'; ?>
    <?php require_once 'include/primera.php'; ?>
    <?php require_once 'include/segunda.php'; ?>
    <?php require_once 'include/tercera.php'; ?>

</table>