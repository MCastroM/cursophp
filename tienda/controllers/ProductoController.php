<?php

require_once 'models/producto.php';

class productoController{

	public function index(){
		
		// Renderizo una vista
		require_once 'views/producto/destacado.php';
	}

	public function gestion(){

		// Verifico si la conección es de administrador
		Utils::isAdmin();

		$producto = new Producto();
		$productos = $producto->getAll();


		require_once 'views/producto/gestion.php';
	}

	public function crear(){
		Utils::isAdmin();

		require_once 'views/producto/crear.php';

	}

	public function save(){
		
	}

}