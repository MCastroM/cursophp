<?php
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

