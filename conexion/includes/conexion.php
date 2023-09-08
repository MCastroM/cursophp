<?php
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
