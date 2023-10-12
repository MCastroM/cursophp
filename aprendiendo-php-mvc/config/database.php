<?php

class database{
	public static function conectar(){
		$conexion = new pg_connect("host='localhost' dbname='notas_master' user='root' password=''");
		$conexion->query("SET NAMES 'utf8'");
		
		return $conexion;
	}
}
