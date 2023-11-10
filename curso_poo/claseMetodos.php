<?php
class Gato{
	function maullar(){
		print "El gato maulla"."<br>";
	}
}


$metodos = get_class_methods("Gato");

foreach($metodos as $metodo){
	print $metodo."<br>";
}

