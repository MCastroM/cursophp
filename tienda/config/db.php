<?php

class Database{
    public static function connect(){  // se crea el metodo estatico
        $db = new mysqli('localhost', 'root','','tienda_master');
        $db->query("SET NAMES 'utf8'"); // manejo de las acentos y las ñ
        return $db;
    }
}