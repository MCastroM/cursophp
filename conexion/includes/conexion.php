<?php
<<<<<<< HEAD
// Conectar  BD Mysql
$server     = 'localhost';
$username   = 'root';
$password   = '';
$database   = 'consesionario';
$db = mysqli_connect($server,$username,$password, $database);

// Consulta para configurar la codificacion de caracteres
mysqli_query($db,"SET NAMES 'utf8'");

// Iniciar sesion
session_start();

=======
// Conexión a BD Postgress
$servidor       = 'localhost';
$usuario        = 'postgres';
$password       = '1234';
$basededatos    = 'consesionario';
$db = pg_connect("host=$servidor dbname=$basededatos user=$usuario password=$password");

// consulta para configurar la codificacion de caracteres
pg_query($db, "SET NAMES 'utf8'");

// Iniciar session
session_start();
>>>>>>> 6cded3fb0be917373596d8c380f515996f645749
