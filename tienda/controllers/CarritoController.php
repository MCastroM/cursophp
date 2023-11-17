<?php
// cargamos el modelo con el objero de producto
require_once 'models/producto.php';

class carritoController{
	public function index(){

		$carrito = $_SESSION['carrito'];

		require_once 'views/carrito/index.php';
		
	}

	public function add(){
		// Verifico so existe la info vía GET de id (trae el id del producto)
		if(isset($_GET['id'])){
			$producto_id = $_GET['id'];
		}else {
			// Si no existe Id del producto hacemos un re ubicacion a  inicio
			header('Location:'.base_url);
		}
		// Verificamos que exista la session de carrito
		if(isset($_SESSION['carrito'])){
			$counter = 0;
			foreach($_SESSION['carrito'] as $indice => $elemento){
				if($elemento['id_producto'] == $producto_id){
					$_SESSION['carrito']['indice']['unidades']++;
					$counter++;
				}
			}

		}

		if(!isset($counter) || $counter == 0){
			// Se hace la consulta a la BD para conocer precion y stock del producto
			// Instanciamos el objeto producto
			$producto = new Producto();
			$producto->setId($producto_id);
			//Lanzamos el metodo que consulta a la BD
			$producto = $producto->getOne();

			// Si no existe la session se crea la Session
			// consulto si carrito es un objero de serlo se añade un elemento
			if(is_object($producto)){
				$_SESSION['carrito'][] = array(
					"id_producto"=>$producto->id,
					"precio" => $producto->precio,
					"unidades" => 1,
					"producto" => $producto
				);
			}
		}


		header('Location:'.base_url."carrito/index");
	}



	public function remove(){
		
	}

	public function delete(){

		unset($_SESSION['carrito']);
		header('Location:'.base_url."carrito/index");
		
	}


}