<?php
require_once 'models/pedido.php';
class pedidoController{

	public function hacer(){

		require_once 'views/pedido/hacer.php';
	
	}

	public function add(){
		if(isset($_SESSION['identity'])){
			$usuario_id = $_SESSION['identity']->id;
			$provincia = isset($_POST['provincia']) ? $_POST['provincia'] : false;
			$localidad = isset($_POST['localidad']) ? $_POST['localidad'] : false;
			$direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;

			$stats = Utils::statsCarrito();
			$coste = $stats['total'];

			if($provincia && $localidad && $direccion){
			// guardar datos
				$pedido = new Pedido();
				$pedido->setUsuario_id($usuario_id);
				$pedido->setProvincia($provincia);
				$pedido->setLocalidad($localidad);
				$pedido->setDireccion($direccion);
				$pedido->setCoste($coste);

				// persiste los datos en la BD con el metodo del objeto save y guardo el pedido linea
				$save = $pedido->save(); 
				$save_linea = $pedido->save_linea();

				if($save && $save_linea){
					$_SESSION['pedido'] = "complete";
				}else{
					$_SESSION['pedido'] = "faliled";
				}

			}else{
				$_SESSION['pedido'] = "faliled";
			}

			header("Location:".base_url.'pedido/confirmado');

		}else{
			//Redirigir al Index
			header("Location:".base_url);
		}

	}

	public function confirmado(){
		// Verifico que este identificado
		if(isset($_SERVER['identity'])){
			$identity = $_SESSION['identity'];
			$pedido = new Pedido();
			$pedido->setUsuario_id($identity->id);
			
			$pedido = $pedido->getOneByUser();
		}


		require_once 'views/pedido/confirmado.php';
	}
}