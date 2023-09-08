<?php
// Conector a BD Postgress
$conexion = pg_connect("host=localhost dbname=consesionario user=postgres password=1234");

// Comprobar si la conexión es correcta.
if(!$conexion) {
    echo "Error: No se ha podido conectar a la base de datos\n";
    } else {
    echo "Conexión exitosa\n";
    }
echo "<br>";
// consulta para configurar la codificacion de caracteres
pg_query($conexion, "SET NAMES 'utf8'");

// consultas SELECT  desde PHP
$resultado=pg_query($conexion,"SELECT * FROM CLIENTES");

while ($row = pg_fetch_assoc($resultado)) {
    echo $row['id']."<br>";
    echo $row['vendedor_id']."<br>";
    echo $row['nombre']."<br>";
    echo $row['ciudad']."<br>";
    echo $row['gastado']."<br>";
    echo $row['fecha']."<br>";

}
/*
// Insertar datos ne la base y tabla seleccionada
$sql = "INSERT INTO clientes (vendedor_id,nombre, ciudad, gastado, fecha) values (3,'Graba desde PHP3', 'Santiago',24000, current_date)";
$insert = pg_query($conexion,$sql);

// Comprobar si la conexión es correcta.
if(!$insert) {
    echo "Error: No se ha podido insertar a la base de datos\n";
    } else {
    echo "Insert exitosa\n";
    }
echo "<br>";

*/
